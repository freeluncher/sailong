<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingPage;

class LandingPageController extends Controller
{
    public function index()
    {
        $pages = LandingPage::all();
        return view('admin.landing-pages.index', compact('pages'));
    }
    public function activate(LandingPage $landingPage)
{
    // Deactivate all landing pages
    LandingPage::query()->update(['is_active' => false]);

    // Activate the selected landing page
    $landingPage->update(['is_active' => true]);

    return redirect()->route('landing-pages.index')
                     ->with('success', 'Landing page activated successfully.');
}
    public function show($id)
    {
        $landingPage = LandingPage::findOrFail($id);

        return view('landing-page', compact('landingPage'));
    }

    public function create()
    {
        return view('admin.landing-pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'hero_image_path' => 'nullable|string|max:255',
            'cards' => 'nullable|array',
            'cards.*.title' => 'required_with:cards|string|max:255',
            'cards.*.description' => 'required_with:cards|string',
            'cards.*.image_path' => 'required_with:cards|string|max:255',
        ]);

        LandingPage::create($request->all());

        return redirect()->route('landing-pages.index')
                         ->with('success', 'Landing page created successfully.');
    }

    public function edit(LandingPage $landingPage)
    {
        return view('admin.landing-pages.edit', compact('landingPage'));
    }

    public function update(Request $request, LandingPage $landingPage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'hero_image_path' => 'nullable|string|max:255',
            'cards' => 'nullable|array',
            'cards.*.title' => 'required_with:cards|string|max:255',
            'cards.*.description' => 'required_with:cards|string',
            'cards.*.image_path' => 'required_with:cards|string|max:255',
        ]);

        $landingPage->update($request->all());

        return redirect()->route('landing-pages.index')
                         ->with('success', 'Landing page updated successfully.');
    }

    public function destroy(LandingPage $landingPage)
    {
        $landingPage->delete();

        return redirect()->route('landing-pages.index')
                         ->with('success', 'Landing page deleted successfully.');
    }
}