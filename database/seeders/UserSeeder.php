<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB as FacadesDB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // user seeder
        $data = [
            [
                'name' => 'Ahmad Mubarok',
                'nik' => '202501',
                'roles' => 'Super Admin',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Reno Feninda',
                'nik' => '202502',
                'roles' => 'Admin',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Algifari',
                'nik' => '202504',
                'roles' => 'Super User',
                'password' => Hash::make('password1234'),
            ],
            [
                'name' => 'Dani Albani',
                'nik' => '202503',
                'roles' => 'User',
                'password' => Hash::make('password12345'),
            ],
            [
                'name' => 'Viana Alfiani',
                'nik' => '202505',
                'roles' => 'Admin',
                'password' => Hash::make('password123456'),
            ],
            
        ];

        FacadesDB::table('user')->insert($data);

    }
}
