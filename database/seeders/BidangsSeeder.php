<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bidangs')->insert([
            [
                'id' => 1,
                'bidang_name' => 'Bidang Keesaan'
            ],
            [
                'id' => 2,
                'bidang_name' => 'Pembinaan Warga Gereja'
            ],
            [
                'id' => 3,
                'bidang_name' => 'Penatalayanan'
            ],
            [
                'id' => 4,
                'bidang_name' => 'Kesaksian dan Pelayanan'
            ],
        ]);
    }
}
