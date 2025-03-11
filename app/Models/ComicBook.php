<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ComicBook extends Model
{
    public function comicBooks(): BelongsToMany
    {
        return $this->belongsToMany(ComicBook::class, 'comic_books_types');
    }
}
