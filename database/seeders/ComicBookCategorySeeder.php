<?php

namespace Database\Seeders;

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
            'name' => 'Horror',
            'description' => 'Horror',
        ]);
        DB::table('categories')->insert([
            'name' => 'Fantasy',
            'description' => 'Fantasy',
        ]);
        DB::table('categories')->insert([
            'name' => 'Action',
            'description' => 'Action',
        ]);
    }
}
