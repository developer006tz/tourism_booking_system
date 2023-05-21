<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attractionimages extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['attractions_id', 'image', 'description'];

    protected $searchableFields = ['*'];

    public function attractions()
    {
        return $this->belongsTo(Attractions::class);
    }
}
