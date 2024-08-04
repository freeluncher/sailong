<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'location',
        'image',
        'gallery',
        'opening_hours',
        'closing_hours',
        'action_buttons', // tambahkan ini
    ];
     protected $casts = [
        'gallery' => 'array',
        'action_buttons' => 'array',
    ];
}