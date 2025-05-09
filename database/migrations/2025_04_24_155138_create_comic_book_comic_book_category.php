<?php

use App\Models\ComicBook;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comic_books_categories', function (Blueprint $table) {
            $table->foreignIdFor(ComicBook::class);
            $table->foreignIdFor(Category::class);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_books_categories');
    }
};
