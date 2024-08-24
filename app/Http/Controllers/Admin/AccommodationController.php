<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Log;

class AccommodationController extends Controller
{
    public function index()
    {
        Log::info('AccommodationController@index called');
        $accommodations = Accommodation::all();
        return view('admin.accommodations.index', compact('accommodations'));
    }

    public function create()
    {
        Log::info('AccommodationController@create called');
        return view('admin.accommodations.create');
    }

    public function store(Request $request)
    {
        Log::info('AccommodationController@store called', ['request_data' => $request->all()]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'required|image',
            'price_per_night' => 'required|numeric',
            'gallery' => 'nullable|array',
            'image' => 'nullable|image',
            'opening_hours' => 'required|date_format:H:i',
            'closing_hours' => 'required|date_format:H:i',
            'action_buttons' => 'nullable|json',
        ]);

        $accommodation = new Accommodation($validated);
        if ($request->hasFile('image')) {
            $accommodation->image = $request->file('image')->store('img', 'public');
        }
        $accommodation->save();

        Log::info('Accommodation created successfully', ['accommodation_id' => $accommodation->id]);

        return redirect()->route('accommodations.index')->with('success', 'Accommodation created successfully.');
    }

    public function show(Accommodation $accommodation)
    {
        Log::info('AccommodationController@show called', ['accommodation_id' => $accommodation->id]);
        return view('accommodations.show', compact('accommodation'));
    }

    public function edit(Accommodation $accommodation)
    {
        Log::info('AccommodationController@edit called', ['accommodation_id' => $accommodation->id]);
        return view('admin.accommodations.edit', compact('accommodation'));
    }

    public function update(Request $request, Accommodation $accommodation)
    {
        Log::info('AccommodationController@update called', ['accommodation_id' => $accommodation->id, 'request_data' => $request->all()]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'price_per_night' => 'required|numeric',
            'gallery' => 'nullable|array',
            'image' => 'nullable|image',
            'opening_hours' => 'required|date_format:H:i',
            'closing_hours' => 'required|date_format:H:i',
            'action_buttons' => 'nullable|json',
        ]);

        $accommodation->update($validated);
        // Handle image upload
        if ($request->hasFile('image')) {
            $accommodation->image = $request->file('image')->store('img', 'public');
            Log::info('Image uploaded successfully:', ['image_path' => $accommodation->image]);
        } else {
            Log::info('No image uploaded.');
        }

        Log::info('Accommodation updated successfully', ['accommodation_id' => $accommodation->id]);

        return redirect()->route('accommodations.index')->with('success', 'Accommodation updated successfully.');
    }

    public function destroy(Accommodation $accommodation)
    {
        Log::info('AccommodationController@destroy called', ['accommodation_id' => $accommodation->id]);

        $accommodation->delete();

        Log::info('Accommodation deleted successfully', ['accommodation_id' => $accommodation->id]);

        return redirect()->route('accommodations.index')->with('success', 'Accommodation deleted successfully.');
    }
}