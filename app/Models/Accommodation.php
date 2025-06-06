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
 * @property float $price_per_night
 * @property array|null $gallery
 * @property string|null $opening_hours
 * @property string|null $closing_hours
 * @property array|null $action_buttons
 */
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

// Laravel Eloquent akan otomatis menambahkan properti 'id' dari primary key tabel
    // Pastikan migrasi sudah ada $table->id() dan model tidak override $primaryKey atau $incrementing
    // Tidak perlu perubahan kode di sini, hanya pastikan migrasi sudah benar
}
