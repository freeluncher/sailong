<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'location',
        'image',
        'ticket_price',
        'gallery',
        'opening_hours',
        'closing_hours',
        'action_buttons', // tambahkan ini
    ];
    protected $casts = [
        'gallery' => 'array',
        'action_buttons' => 'array', // tambahkan ini
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}