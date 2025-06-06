<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $location
 * @property string|null $image
 * @property float $ticket_price
 * @property array|null $gallery
 * @property string|null $opening_hours
 * @property string|null $closing_hours
 * @property array|null $action_buttons
 */
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
