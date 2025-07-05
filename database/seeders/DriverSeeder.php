<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Driver;
use App\Models\Kantor;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kantor = Kantor::first();

        Driver::insert([
            ['nama' => 'Driver A', 'nik' => 'DR001', 'kantor_id' => $kantor->id],
            ['nama' => 'Driver B', 'nik' => 'DR002', 'kantor_id' => $kantor->id],
        ]);
    }
}
