<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
        'image',
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