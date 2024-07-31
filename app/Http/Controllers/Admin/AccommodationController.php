<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accommodation;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::all();
        return view('admin.accommodations.index', compact('accommodations'));
    }

    public function create()
    {
        return view('admin.accommodations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'required|image',
            'price_per_night' => 'required|numeric',
            'gallery' => 'required|array',
            'gallery.*' => 'image',
        ]);

        $accommodation = new Accommodation($validated);
        $accommodation->save();

        return redirect()->route('accommodations.index')->with('success', 'Accommodation created successfully.');
    }

    public function show(Accommodation $accommodation)
    {
        return view('accommodations.show', compact('accommodation'));
    }

    public function edit(Accommodation $accommodation)
    {
        return view('admin.accommodations.edit', compact('accommodation'));
    }

    public function update(Request $request, Accommodation $accommodation)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'sometimes|image',
            'price_per_night' => 'required|numeric',
            'gallery' => 'sometimes|array',
            'gallery.*' => 'image',
        ]);

        $accommodation->update($validated);

        return redirect()->route('accommodations.index')->with('success', 'Accommodation updated successfully.');
    }

    public function destroy(Accommodation $accommodation)
    {
        $accommodation->delete();

        return redirect()->route('accommodations.index')->with('success', 'Accommodation deleted successfully.');
    }
}