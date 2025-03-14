<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComicBookTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            'name' => 'Graphic Novel',
            'description' => 'Graphic Novel',
        ]);
        
        DB::table('types')->insert([
            'name' => 'Single Comic Book',
            'description' => 'Single magazine',
        ]);

        DB::table('types')->insert([
            'name' => 'Manga',
            'description' => 'Magazine from Japan',
        ]);
    }
}
