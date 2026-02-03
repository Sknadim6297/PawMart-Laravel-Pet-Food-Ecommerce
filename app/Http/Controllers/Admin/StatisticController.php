<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = Statistic::ordered()->get();
        return view('admin.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'required|integer|min:0',
            'suffix' => 'nullable|string|max:10',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        $data = $request->only(['title', 'number', 'suffix', 'sort_order']);
        // Ensure suffix is not null to satisfy DB constraints
        $data['suffix'] = $data['suffix'] ?? '+';
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('statistics', 'public');
        }

        Statistic::create($data);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistic created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistic $statistic)
    {
        return view('admin.statistics.show', compact('statistic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistic $statistic)
    {
        return view('admin.statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'required|integer|min:0',
            'suffix' => 'nullable|string|max:10',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        $data = $request->only(['title', 'number', 'suffix', 'sort_order']);
        // Ensure suffix is not null to satisfy DB constraints
        $data['suffix'] = $data['suffix'] ?? '+';
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('icon')) {
            // Delete old icon
            if ($statistic->icon) {
                Storage::disk('public')->delete($statistic->icon);
            }
            $data['icon'] = $request->file('icon')->store('statistics', 'public');
        }

        $statistic->update($data);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistic updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistic $statistic)
    {
        // Delete icon
        if ($statistic->icon) {
            Storage::disk('public')->delete($statistic->icon);
        }

        $statistic->delete();

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistic deleted successfully!');
    }
}