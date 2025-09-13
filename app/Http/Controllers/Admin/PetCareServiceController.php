<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PetCareService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PetCareServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = PetCareService::orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        return view('admin.pet-care-services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pet-care-services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Handle icon upload
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconName = time() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('assets/img'), $iconName);
            $data['icon'] = 'assets/img/' . $iconName;
        }

        // Set default values
        $data['is_active'] = $request->has('is_active') ? true : false;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        PetCareService::create($data);

        return redirect()->route('admin.pet-care-services.index')
            ->with('success', 'Pet care service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PetCareService $petCareService)
    {
        return view('admin.pet-care-services.show', compact('petCareService'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PetCareService $petCareService)
    {
        return view('admin.pet-care-services.edit', compact('petCareService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PetCareService $petCareService)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        // Generate slug if name changed and slug is empty
        if ($petCareService->name !== $data['name'] && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Handle icon upload
        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($petCareService->icon && file_exists(public_path($petCareService->icon))) {
                unlink(public_path($petCareService->icon));
            }
            
            $icon = $request->file('icon');
            $iconName = time() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('assets/img'), $iconName);
            $data['icon'] = 'assets/img/' . $iconName;
        }

        // Set default values
        $data['is_active'] = $request->has('is_active') ? true : false;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $petCareService->update($data);

        return redirect()->route('admin.pet-care-services.index')
            ->with('success', 'Pet care service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PetCareService $petCareService)
    {
        // Delete icon file if exists
        if ($petCareService->icon && file_exists(public_path($petCareService->icon))) {
            unlink(public_path($petCareService->icon));
        }

        $petCareService->delete();

        return redirect()->route('admin.pet-care-services.index')
            ->with('success', 'Pet care service deleted successfully.');
    }

    /**
     * Toggle the active status of a service
     */
    public function toggleStatus(PetCareService $petCareService)
    {
        $petCareService->update(['is_active' => !$petCareService->is_active]);

        $status = $petCareService->is_active ? 'activated' : 'deactivated';
        
        return redirect()->back()
            ->with('success', "Pet care service {$status} successfully.");
    }
}