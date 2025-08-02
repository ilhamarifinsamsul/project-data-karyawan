<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Facade;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Operational',
            ],
            [
                'name' => 'Produksi',
            ],
            [
                'name' => 'HR',
            ],
            [
                'name' => 'Warehouse',
            ],
            [
                'name' => 'GA',
            ],
        ];

        FacadesDB::table('departement')->insert($data);
    }
}
