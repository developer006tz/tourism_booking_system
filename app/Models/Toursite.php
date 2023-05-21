<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Toursite extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'country_id',
        'other_name',
        'description',
        'accomodation',
        'region',
        'district',
        'distance',
        'attractions',
        'local_price',
        'international_price',
        'time_of_visit',
    ];

    protected $searchableFields = ['*'];

    public function allToursiteimages()
    {
        return $this->hasMany(Toursiteimages::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function allAttractions()
    {
        return $this->hasMany(Attractions::class);
    }

    public function allAccomodations()
    {
        return $this->hasMany(Accomodations::class);
    }

    public function allTransportation()
    {
        return $this->hasMany(Transportation::class);
    }

    public function tourguideagents()
    {
        return $this->hasMany(Tourguideagent::class);
    }
}
