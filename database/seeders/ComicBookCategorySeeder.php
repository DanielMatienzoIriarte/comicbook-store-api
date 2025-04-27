<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComicBookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Science Fiction',
            'description' => 'science fiction',
        ]);

        DB::table('categories')->insert([
            'name' => 'Horror',
            'description' => 'horror',
        ]);

        DB::table('categories')->insert([
            'name' => 'Fantasy',
            'description' => 'fantasy',
        ]);
    }
}
