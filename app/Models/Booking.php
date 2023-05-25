<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'toursite_id',
        'transportation_id',
        'accomodations_id',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toursite()
    {
        return $this->belongsTo(Toursite::class);
    }

    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }

    public function accomodations()
    {
        return $this->belongsTo(Accomodations::class);
    }
}
