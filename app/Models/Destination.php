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
    ];
    protected $casts = [
        'gallery' => 'array',
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}