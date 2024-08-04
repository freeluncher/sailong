<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;

class AdminCuisineController extends Controller
{
    public function index()
    {
        $cuisines = Cuisine::all();
        return view('admin.cuisines.index', compact('cuisines'));
    }
    public function edit($id)
    {
        $cuisine = Cuisine::findOrFail($id);
        return view('admin.cuisines.edit', compact('cuisine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'required|string|max:255',
            'opening_hours' => 'required|date_format:H:i',
            'closing_hours' => 'required|date_format:H:i',
            'ticket_price' => 'required|numeric',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'action_buttons' => 'nullable|json',
        ]);

        $cuisine = Cuisine::findOrFail($id);
        $cuisine->name = $request->name;
        $cuisine->description = $request->description;
        $cuisine->location = $request->location;
        $cuisine->opening_hours = $request->opening_hours;
        $cuisine->closing_hours = $request->closing_hours;
        $cuisine->ticket_price = $request->ticket_price;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cuisines', 'public');
            $cuisine->image = $imagePath;
        }

        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryPaths[] = ['image' => $galleryImage->store('cuisines/gallery', 'public')];
            }
            $cuisine->gallery = $galleryPaths;
        }

        if ($request->action_buttons) {
            $cuisine->action_buttons = json_decode($request->action_buttons, true);
        }

        $cuisine->save();

        return redirect()->route('admin.cuisines.index')->with('success', 'Cuisine updated successfully.');
    }
}