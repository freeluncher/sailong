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
            'image' => 'nullable|image',
            'price_per_night' => 'required|numeric',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image',
            'opening_hours' => 'nullable',
            'closing_hours' => 'nullable',
            'action_buttons' => 'nullable|array',
        ]);

        $accommodation = new Accommodation($request->except('image', 'gallery'));

        // Handle main image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            $accommodation->image = $imagePath;
        }

        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryPaths[] = ['image' => $galleryImage->store('img', 'public')];
            }
            $accommodation->gallery = $galleryPaths; // Store directly as array
        }

        $accommodation->save();

        Log::info('Accommodation created successfully', ['accommodation_id' => $accommodation->id]);

        return redirect()->route('accommodations.index')->with('success', 'Accommodation created successfully.');
    }

    public function show($id)
    {
        Log::info('AccommodationController@show called', ['accommodation_id' => $id]);
        $accommodation = Accommodation::findOrFail($id);

        // Pastikan gallery diubah menjadi array hanya jika bukan array
        $accommodation->gallery = is_array($accommodation->gallery) ? $accommodation->gallery : json_decode($accommodation->gallery, true);

        return view('accommodations.show', compact('accommodation'));
    }


    public function edit(Accommodation $accommodation)
    {
        Log::info('AccommodationController@edit called', ['accommodation_id' => $accommodation->id]);
        return view('admin.accommodations.edit', compact('accommodation'));
    }

    public function update(Request $request, Accommodation $accommodation)
    {
        Log::info('AccommodationController@update called', [
            'accommodation_id' => $accommodation->id,
            'request_data' => $request->all()
        ]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'price_per_night' => 'required|numeric',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image', // Validate each gallery image
            'image' => 'nullable|image',
            'opening_hours' => 'nullable',
            'closing_hours' => 'nullable',
            'action_buttons' => 'nullable|array',
        ]);

        $accommodation->fill($request->except('image', 'gallery'));

        // Handle main image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            $accommodation->image = $imagePath;
        }

        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryPaths[] = ['image' => $galleryImage->store('img', 'public')];
            }
            $accommodation->gallery = $galleryPaths; // Store directly as array
        }
        Log::info('Gallery data:', ['gallery' => $accommodation->gallery]);
        $accommodation->save();


        Log::info('Accommodation updated successfully', ['accommodation_id' => $accommodation->id]);

        return redirect()->route('accommodations.index')->with('success', 'Accommodation updated successfully.');
    }

    public function destroy(Accommodation $accommodation)
    {
        Log::info('AccommodationController@destroy called', ['accommodation_id' => $accommodation->id]);

        $accommodation->delete();

        Log::info('Accommodation deleted successfully', ['accommodation_id' => $accommodation->id]);

        return redirect()->route('admin.accommodations.index')->with('success', 'Accommodation deleted successfully.');
    }
}
