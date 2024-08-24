<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Log;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->gallery = is_array($destination->gallery) ? $destination->gallery : json_decode($destination->gallery, true);
        return view('destinations.show', compact('destination'));
    }

    public function manage()
    {
        $destinations = Destination::all();
        return view('admin.destinations.manage', compact('destinations'));
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image',
            'ticket_price' => 'required|numeric',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image',
            'opening_hours' => 'required',
            'closing_hours' => 'required',
            'action_buttons' => 'nullable|array',
        ]);

        $destination = new Destination($request->except('image', 'gallery'));

        // Handle main image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            $destination->image = $imagePath;
        }

        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryPaths[] = ['image' => $galleryImage->store('img', 'public')];
            }
            $destination->gallery = $galleryPaths; // Store directly as array
        }

        $destination->save();

        return redirect()->route('admin.destinations.manage');
    }




    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image',
            'ticket_price' => 'required|numeric',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image',
            'opening_hours' => 'required',
            'closing_hours' => 'required',
            'action_buttons' => 'nullable|array',
        ]);

        $destination->fill($request->except('image', 'gallery'));

        // Handle main image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            $destination->image = $imagePath;
        }

        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryPaths[] = ['image' => $galleryImage->store('img', 'public')];
            }
            $destination->gallery = $galleryPaths; // Store directly as array
        }

        $destination->save();

        return redirect()->route('admin.destinations.manage');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('admin.destinations.manage');
    }
}