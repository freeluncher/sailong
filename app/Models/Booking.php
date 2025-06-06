<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int|null $destination_id
 * @property int|null $tour_id
 * @property string $booking_date
 * @property float $total_price
 */
class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'destination_id',
        'tour_id',
        'booking_date',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
