<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tourguideagent extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'toursite_id',
        'title',
        'description',
        'guide_price_per_day',
        'rating',
        'distance_covered',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    public function toursite()
    {
        return $this->belongsTo(Toursite::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
