<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kantor;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kantor = Kantor::first();

        User::create([
            'name' => 'Admin Kantor',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'jabatan' => 'Admin Operasional',
            'kantor_id' => $kantor->id,
        ]);

        User::create([
            'name' => 'Atasan Level 1',
            'email' => 'atasan1@example.com',
            'password' => Hash::make('password'),
            'role' => 'approver',
            'jabatan' => 'Manager Operasional',
            'level_approval' => 1,
            'kantor_id' => $kantor->id,
        ]);

        User::create([
            'name' => 'Atasan Level 2',
            'email' => 'atasan2@example.com',
            'password' => Hash::make('password'),
            'role' => 'approver',
            'jabatan' => 'GM Site',
            'level_approval' => 2,
            'kantor_id' => $kantor->id,
        ]);
    }
}
