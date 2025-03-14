<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Model
{
    public function comicBooks(): BelongsToMany
    {
        return $this->belongsToMany(ComicBook::class, 'comic_books_types', 'comic_book_id', 'type_id');
    }
}
