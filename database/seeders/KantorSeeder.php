<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kantor;
use App\Models\Region;
class KantorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $region = Region::first();

        Kantor::insert([
            ['name' => 'Kantor Pusat', 'type' => 'pusat', 'region_id' => $region->id],
            ['name' => 'Kantor Cabang', 'type' => 'cabang', 'region_id' => $region->id],
            ['name' => 'Tambang A', 'type' => 'tambang', 'region_id' => $region->id],
            ['name' => 'Tambang B', 'type' => 'tambang', 'region_id' => $region->id],
            ['name' => 'Tambang C', 'type' => 'tambang', 'region_id' => $region->id],
            ['name' => 'Tambang D', 'type' => 'tambang', 'region_id' => $region->id],
        ]);
    }
}
