<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'location',
        'image',
        'price_per_night',
        'gallery',
    ];
     protected $casts = [
        'gallery' => 'array',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
