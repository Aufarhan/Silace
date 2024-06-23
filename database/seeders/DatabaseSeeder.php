<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Region;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\StatusSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
    protected static ?string $password;
    public function run(): void
    {
        // User::factory(10)->create();
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'admin',
            'email' => 'admin@silace.com',
            'phone' => '08123456789',
            'password' => static::$password ??= Hash::make('admin'),
            'is_admin' => '1',
        ]);
        
        $this->call([
            CategorySeeder::class,
            RegionSeeder::class,
            PostSeeder::class,
            StatusSeeder::class,
        ]);
        

    }
}
