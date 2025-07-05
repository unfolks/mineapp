<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RegionSeeder::class,
            KantorSeeder::class,
            PerusahaanSewaSeeder::class,
            UserSeeder::class,
            DriverSeeder::class,
            KendaraanSeeder::class,
        ]);
        // User::factory()->create([
        //     'id' => 1,
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => bcrypt('test1234'),
        //     'email_verified_at' => now(),
        //     'role' => 'admin',
        // ]);

        // User::factory()->create([
        //     'id' => 2,
        //     'name' => 'Manager',
        //     'email' => 'test2@example.com',
        //     'password' => bcrypt('test1234'),
        //     'email_verified_at' => now(),
        //     'role' => 'manager',
        // ]);
    }
}
