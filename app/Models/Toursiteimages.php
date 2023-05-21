<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Toursiteimages extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['toursite_id', 'url', 'description'];

    protected $searchableFields = ['*'];

    public function toursite()
    {
        return $this->belongsTo(Toursite::class);
    }
}
