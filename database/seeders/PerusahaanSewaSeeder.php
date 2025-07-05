<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PerusahaanSewa;

class PerusahaanSewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PerusahaanSewa::insert([
            ['name' => 'PT Sewa Mobil Nusantara', 'contact_info' => '08123456789'],
            ['name' => 'CV Transport Logistik', 'contact_info' => '082233445566'],
        ]);
    }
}
