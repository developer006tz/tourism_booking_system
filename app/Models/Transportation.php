<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transportation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'toursite_id',
        'type',
        'price',
        'distance_covered_in_km',
        'image',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'transportations';

    public function toursite()
    {
        return $this->belongsTo(Toursite::class);
    }
}
