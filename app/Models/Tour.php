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
        'action_buttons', // tambahkan ini
    ];
     protected $casts = [
        'gallery' => 'array',
        'action_buttons' => 'array',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}