<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
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
        // Pastikan gallery diambil sebagai array
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
            'image' => 'required|image',
            'ticket_price' => 'required|numeric',
            'gallery' => 'nullable|array',
            'opening_hours' => 'required|date_format:H:i', // tambahkan ini
            'closing_hours' => 'required|date_format:H:i', // tambahkan ini
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image',
            'ticket_price' => 'required|numeric',
            'gallery' => 'nullable|array',
            'opening_hours' => 'required|date_format:H:i', // tambahkan ini
            'closing_hours' => 'required|date_format:H:i', // tambahkan ini
            'action_buttons' => 'nullable|array',
        ]);

        $destination->fill($request->all());
        if ($request->hasFile('image')) {
            $destination->image = $request->file('image')->store('images', 'public');
        }
        if ($request->has('action_buttons')) {
        $actionButtons = array_values($request->input('action_buttons'));
        $destination->action_buttons = $actionButtons;
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