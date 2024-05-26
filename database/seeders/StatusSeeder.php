<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            'name' => 'Laporan Diterima',
            'slug' => 'laporan-diterima',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Dalam Verifikasi',
            'slug' => 'dalam-verifikasi',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Sedang Diproses',
            'slug' => 'sedang-diproses',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Laporan Selesai',
            'slug' => 'laporan-selesai',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Privasi',
            'slug' => 'privasi',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Sedang Diproses (Private)',
            'slug' => 'sedang-diproses-private',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Laporan Selesai (Private)',
            'slug' => 'laporan-selesai-private',
        ]);
    }
}
