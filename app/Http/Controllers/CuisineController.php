<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
      public function index()
    {
        $cuisines = Cuisine::all();
        return view('cuisines.index', compact('cuisines'));
    }
   public function show(Cuisine $cuisine)
    {
    return view('cuisines.show', compact('cuisine'));
    }
}