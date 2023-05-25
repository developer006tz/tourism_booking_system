<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accomodations extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'toursite_id',
        'name',
        'type',
        'sleep_service',
        'description',
        'local_night_fee',
        'international_night_fee',
        'food_service',
        'food_types_and_price',
        'is_inside_park',
        'distance_to_tour_site',
        'room_available',
    ];

    protected $searchableFields = ['*'];

    public function toursite()
    {
        return $this->belongsTo(Toursite::class);
    }

    public function allAccomodationimages()
    {
        return $this->hasMany(Accomodationimages::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
