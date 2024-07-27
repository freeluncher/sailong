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
            'opening_hours' => 'required',
            'closing_hours' => 'required',
            'action_buttons' => 'nullable|array',
        ]);

        $destination = new Destination($request->all());
        if ($request->hasFile('image')) {
            $destination->image = $request->file('image')->store('images', 'public');
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
        // Log the incoming request data
        Log::info('Update request received:', $request->all());

        // Validate the request data
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string',
                'image' => 'nullable|image',
                'ticket_price' => 'required|numeric',
                'gallery' => 'nullable|array',
                'opening_hours' => 'required',
                'closing_hours' => 'required',
                'action_buttons' => 'nullable|array',
            ]);
            Log::info('Request data validated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error:', ['errors' => $e->errors()]);
            return redirect()->back()->withErrors($e->errors());
        }

        // Fill the destination with validated data
        $destination->fill($request->all());
        Log::info('Destination model filled with request data:', ['destination' => $destination]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $destination->image = $request->file('image')->store('images', 'public');
            Log::info('Image uploaded successfully:', ['image_path' => $destination->image]);
        } else {
            Log::info('No image uploaded.');
        }
        // Attempt to save the updated destination
        try {
            $destination->save();
            Log::info('Destination updated successfully:', ['id' => $destination->id]);
        } catch (\Exception $e) {
            Log::error('Error saving destination:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the destination.']);
        }

        // Redirect to the manage destinations page
        Log::info('Redirecting to manage destinations page.');
        return redirect()->route('admin.destinations.manage');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('admin.destinations.manage');
    }
}