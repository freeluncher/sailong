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
        'opening_hours',
        'closing_hours',
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
    public function getActionButtonsAttribute($value)
{
    return $value ? json_decode($value, true) : [];
}
}