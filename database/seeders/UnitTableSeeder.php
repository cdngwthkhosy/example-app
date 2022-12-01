<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $names = [
            [
                'name' => 'PG/TK'
            ],
            [
                'name' => 'SD'
            ],
            [
                'name' => 'SMP'
            ],
            [
                'name' => 'SMA'
            ],
            [
                'name' => 'Divisi Umum dan SDM'
            ],
            [
                'name' => 'Divisi Teknologi dan Pengembangan'
            ],
            [
                'name' => 'Divisi Keuangan'
            ],
            [
                'name' => 'Direksi'
            ]
        ];
        
        $unit = Unit::insert($names);
    }
}
