<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;
use Illuminate\Support\Facades\Log;

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

        // Pastikan action_buttons selalu berupa array
        $cuisine->action_buttons = $cuisine->action_buttons ?? [];

        return view('admin.cuisines.edit', compact('cuisine'));
    }


    public function update(Request $request, $id)
    {
        // Logging request data
        Log::info('Update request data:', $request->all());

        $cuisine = Cuisine::findOrFail($id);
        $cuisine->update($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('img', 'public');
            $cuisine->image = $image;
            $cuisine->save();
        }

        if ($request->hasFile('gallery')) {
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