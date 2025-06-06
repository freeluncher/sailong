<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $duration
 * @property string|null $image
 * @property array|null $gallery
 * @property array|null $action_buttons
 */
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
