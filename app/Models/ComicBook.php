<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ComicBook extends Model
{
    protected $fillable = [
        'name',
        'description',
        'types',
    ];

    protected $guarded = [];

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'comic_books_types', 'comic_book_id', 'type_id');
    }
}
