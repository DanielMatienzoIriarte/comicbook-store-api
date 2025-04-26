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

    /**
     * The types a book has
     */
    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'comic_books_types', 'comic_book_id', 'id');
    }

    /**
     * The categories a book has
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'comic_books_categories', 'comic_book_id', 'category_id');
    }
}
