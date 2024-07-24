<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accommodation;
class AccommodationController extends Controller
{
     public function index()
    {
        $accommodations = Accommodation::all();
        return view('accommodations.index', compact('accommodations'));
    }
   public function show(Accommodation $accommodation)
    {
    return view('accommodations.show', compact('accommodation'));
    }
}