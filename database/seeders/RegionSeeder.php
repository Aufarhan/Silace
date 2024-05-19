<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jakarta Pusat
        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Pusat',
            'kecamatan' => 'Tanah Abang',
            'slug' => 'jakarta-pusat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Pusat',
            'kecamatan' => 'Menteng',
            'slug' => 'jakarta-pusat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Pusat',
            'kecamatan' => 'Senen',
            'slug' => 'jakarta-pusat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Pusat',
            'kecamatan' => 'Cempaka Putih',
            'slug' => 'jakarta-pusat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Pusat',
            'kecamatan' => 'Johar Baru',
            'slug' => 'jakarta-pusat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Pusat',
            'kecamatan' => 'Kemayoran',
            'slug' => 'jakarta-pusat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Pusat',
            'kecamatan' => 'Sawah Besar',
            'slug' => 'jakarta-pusat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Pusat',
            'kecamatan' => 'Gambir',
            'slug' => 'jakarta-pusat',
        ]);

        // Jakarta Utara
        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Utara',
            'kecamatan' => 'Cilincing',
            'slug' => 'jakarta-utara',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Utara',
            'kecamatan' => 'Koja',
            'slug' => 'jakarta-utara',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Utara',
            'kecamatan' => 'Kelapa Gading',
            'slug' => 'jakarta-utara',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Utara',
            'kecamatan' => 'Tanjung Priok',
            'slug' => 'jakarta-utara',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Utara',
            'kecamatan' => 'Pademangan',
            'slug' => 'jakarta-utara',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Utara',
            'kecamatan' => 'Penjaringan',
            'slug' => 'jakarta-utara',
        ]);

        // Jakarta Barat
        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Barat',
            'kecamatan' => 'Kembangan',
            'slug' => 'jakarta-barat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Barat',
            'kecamatan' => 'Kebon Jeruk',
            'slug' => 'jakarta-barat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Barat',
            'kecamatan' => 'Palmerah',
            'slug' => 'jakarta-barat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Barat',
            'kecamatan' => 'Grogol Petamburan',
            'slug' => 'jakarta-barat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Barat',
            'kecamatan' => 'Tambora',
            'slug' => 'jakarta-barat',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Barat',
            'kecamatan' => 'Taman Sari',
            'slug' => 'jakarta-barat',
        ]);

        // Jakarta Selatan
        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Selatan',
            'kecamatan' => 'Jagakarsa',
            'slug' => 'jakarta-selatan',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Selatan',
            'kecamatan' => 'Pasar Minggu',
            'slug' => 'jakarta-selatan',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Selatan',
            'kecamatan' => 'Cilandak',
            'slug' => 'jakarta-selatan',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Selatan',
            'kecamatan' => 'Pesanggrahan',
            'slug' => 'jakarta-selatan',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Selatan',
            'kecamatan' => 'Kebayoran Lama',
            'slug' => 'jakarta-selatan',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Selatan',
            'kecamatan' => 'Kebayoran Baru',
            'slug' => 'jakarta-selatan',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Selatan',
            'kecamatan' => 'Mampang Prapatan',
            'slug' => 'jakarta-selatan',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Selatan',
            'kecamatan' => 'Pancoran',
            'slug' => 'jakarta-selatan',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Selatan',
            'kecamatan' => 'Tebet',
            'slug' => 'jakarta-selatan',
        ]);

        // Jakarta Timur
        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Timur',
            'kecamatan' => 'Pasar Rebo',
            'slug' => 'jakarta-timur',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Timur',
            'kecamatan' => 'Cipayung',
            'slug' => 'jakarta-timur',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Timur',
            'kecamatan' => 'Makasar',
            'slug' => 'jakarta-timur',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Timur',
            'kecamatan' => 'Ciracas',
            'slug' => 'jakarta-timur',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Timur',
            'kecamatan' => 'Cakung',
            'slug' => 'jakarta-timur',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Timur',
            'kecamatan' => 'Duren Sawit',
            'slug' => 'jakarta-timur',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Timur',
            'kecamatan' => 'Kramat Jati',
            'slug' => 'jakarta-timur',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Timur',
            'kecamatan' => 'Matraman',
            'slug' => 'jakarta-timur',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Timur',
            'kecamatan' => 'Pulo Gadung',
            'slug' => 'jakarta-timur',
        ]);

        DB::table('regions')->insert([
            'wilayah' => 'Jakarta Timur',
            'kecamatan' => 'Jatinegara',
            'slug' => 'jakarta-timur',
        ]);
    }
}
