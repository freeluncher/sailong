<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreCuisineRequest;
use App\Http\Requests\UpdateCuisineRequest;

class AdminCuisineController extends Controller
{
    public function index()
    {
        $cuisines = Cuisine::all();
        return view('admin.cuisines.index', compact('cuisines'));
    }

    public function create()
    {
        return view('admin.cuisines.create');
    }

    public function store(StoreCuisineRequest $request)
    {
        $image = $request->file('image')->store('img', 'public');

        $galleryImages = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('img', 'public');
                $galleryImages[] = ['image' => $path];
            }
        }

        $cuisine = Cuisine::create([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'image' => $image,
            'gallery' => $galleryImages,
            'opening_hours' => $request->opening_hours,
            'closing_hours' => $request->closing_hours,
            'ticket_price' => $request->ticket_price,
        ]);

        return redirect()->route('admin.cuisines.index')->with('success', 'Cuisine created successfully.');
    }


    public function edit($id)
    {
        $cuisine = Cuisine::findOrFail($id);

        // Pastikan action_buttons selalu berupa array
        $cuisine->action_buttons = $cuisine->action_buttons ?? [];

        return view('admin.cuisines.edit', compact('cuisine'));
    }


    public function update(UpdateCuisineRequest $request, $id)
    {
        Log::info('Update request data:', $request->all());

        $cuisine = Cuisine::findOrFail($id);
        $cuisine->update($request->except('image', 'gallery'));

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada dan diganti
            if ($cuisine->image && \Storage::disk('public')->exists($cuisine->image)) {
                \Storage::disk('public')->delete($cuisine->image);
            }
            $image = $request->file('image')->store('img', 'public');
            $cuisine->image = $image;
            $cuisine->save();
        }

        if ($request->hasFile('gallery')) {
            // Hapus file gallery lama jika diganti
            if (is_array($cuisine->gallery)) {
                foreach ($cuisine->gallery as $galleryItem) {
                    if (isset($galleryItem['image']) && \Storage::disk('public')->exists($galleryItem['image'])) {
                        \Storage::disk('public')->delete($galleryItem['image']);
                    }
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('img', 'public');
                $galleryImages[] = ['image' => $path];
            }
            $cuisine->gallery = $galleryImages;
            $cuisine->save();
        }

        $cuisine->action_buttons = $request->input('action_buttons');
        $cuisine->save();

        return redirect()->route('admin.cuisines.index')->with('success', 'Cuisine updated successfully.');
    }
    public function show($id)
    {
        // Ambil data 'cuisine' dari database berdasarkan ID
        $cuisine = Cuisine::find($id);

        // Pastikan 'action_buttons' adalah array atau inisialisasi dengan array kosong jika null
        $actionButtons = $cuisine->action_buttons ?? [];

        // Kirim data ke view
        return view('cuisine.show', compact('cuisine', 'actionButtons'));
    }


    public function destroy($id)
    {
        $cuisine = Cuisine::findOrFail($id);
        $cuisine->delete();

        return redirect()->route('admin.cuisines.index')->with('success', 'Cuisine deleted successfully.');
    }
}