<?php

use App\Models\ComicBook;
use App\Models\Type;
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
        /* Schema::create('comic_books_types', function (Blueprint $table) {
            $table->unsignedBigInteger('comic_book_id');
            $table->foreign('comic_book_id')->references('id')->on('comic_books')->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->timestamps();
        }); */
        Schema::create('comic_books_types', function (Blueprint $table) {
            $table->foreignIdFor(ComicBook::class);
            $table->foreignIdFor(Type::class);
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
        Schema::dropIfExists('comic_books_types');
    }
};
