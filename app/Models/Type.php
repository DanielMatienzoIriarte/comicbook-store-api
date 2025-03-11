<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ComicBookType extends Model
{
    public function types(): BelongsToMany
    {
        return $this->belongsToMany(ComicBookType::class, 'comic_books_types');
    }
}
