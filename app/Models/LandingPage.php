<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;
     protected $fillable = ['title', 'content', 'hero_image_path', 'cards', 'is_active'];

    protected $casts = [
        'cards' => 'array',
    ];
}
