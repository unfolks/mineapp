<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kendaraan;
use App\Models\Kantor;
use App\Models\PerusahaanSewa;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kantor = Kantor::first();
        $sewa = PerusahaanSewa::first();

        Kendaraan::insert([
            [
                'jenis' => 'orang',
                'kantor_id' => 1,
                'merk' => 'Toyota',
                'nomor_polisi' => 'DD 1234 XX',
                'status_kepemilikan' => 'milik',
                'tahun' => 2020,
                'tipe' => 'Innova',
            ],
            [
                'jenis' => 'barang',
                'kantor_id' => 1,
                'merk' => 'Isuzu',
                'nomor_polisi' => 'DD 5678 YY',
                'status_kepemilikan' => 'sewa',
                'tahun' => 2021,
                'tipe' => 'Traga',
            ],
        ]);

    }
}
