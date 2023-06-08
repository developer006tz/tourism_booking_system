<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;

class BookinPackage extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'toursite_id',
        'title',
        'description',
        'time',
        'price',
        'quantity',
        'review',
    ];

    protected $searchableFields = ['*'];

    public function toursite()
    {
        return $this->belongsTo(Toursite::class);
    }
}
