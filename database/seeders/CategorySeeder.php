<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Kehilangan',
            'slug' => 'kehilangan',
        ]);

        DB::table('categories')->insert([
            'name' => 'Pencurian',
            'slug' => 'pencurian',
        ]);

        DB::table('categories')->insert([
            'name' => 'Lingkungan',
            'slug' => 'Lingkungan',
        ]);

        DB::table('categories')->insert([
            'name' => 'Kejahatan',
            'slug' => 'kejahatan',
        ]);
        DB::table('categories')->insert([
            'name' => 'Info',
            'slug' => 'info',
        ]);
    }
}
