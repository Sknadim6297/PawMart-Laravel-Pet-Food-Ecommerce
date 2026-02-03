<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $welcomeSections = WelcomeSection::ordered()->get();
        return view('admin.welcome-sections.index', compact('welcomeSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.welcome-sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0'
        ]);

    $data = $request->only(['title', 'description', 'button_text', 'button_link', 'sort_order']);
    // Ensure button_link is not null to satisfy DB constraints
    $data['button_link'] = $data['button_link'] ?? '#';
    $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('welcome-sections', 'public');
        }

        WelcomeSection::create($data);

        return redirect()->route('admin.welcome-sections.index')
            ->with('success', 'Welcome section created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(WelcomeSection $welcomeSection)
    {
        return view('admin.welcome-sections.show', compact('welcomeSection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WelcomeSection $welcomeSection)
    {
        return view('admin.welcome-sections.edit', compact('welcomeSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WelcomeSection $welcomeSection)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0'
        ]);

    $data = $request->only(['title', 'description', 'button_text', 'button_link', 'sort_order']);
    // Ensure button_link is not null to satisfy DB constraints
    $data['button_link'] = $data['button_link'] ?? '#';
    $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($welcomeSection->image) {
                Storage::disk('public')->delete($welcomeSection->image);
            }
            $data['image'] = $request->file('image')->store('welcome-sections', 'public');
        }

        $welcomeSection->update($data);

        return redirect()->route('admin.welcome-sections.index')
            ->with('success', 'Welcome section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WelcomeSection $welcomeSection)
    {
        // Delete image
        if ($welcomeSection->image) {
            Storage::disk('public')->delete($welcomeSection->image);
        }

        $welcomeSection->delete();

        return redirect()->route('admin.welcome-sections.index')
            ->with('success', 'Welcome section deleted successfully!');
    }
}
