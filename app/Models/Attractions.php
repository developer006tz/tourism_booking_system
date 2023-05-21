<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attractions extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['toursite_id', 'name', 'description', 'distance'];

    protected $searchableFields = ['*'];

    public function toursite()
    {
        return $this->belongsTo(Toursite::class);
    }

    public function allAttractionimages()
    {
        return $this->hasMany(Attractionimages::class);
    }
}
