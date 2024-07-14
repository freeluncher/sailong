<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingPage;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = LandingPage::all();
        return view('admin.landing-pages.index', compact('pages'));
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
