<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PastorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pastors')->insert([
            [
                'id' => 1,
                'pastor_name' => 'Ngab Risang',
                'pastor_church' => 'Gereja Kristus'
            ],
            [
                'id' => 2,
                'pastor_name' => 'Risang Ngab',
                'pastor_church' => 'Gereja Deket Rumah'
            ],
        ]);
    }
}
