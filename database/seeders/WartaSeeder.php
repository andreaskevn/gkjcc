<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WartaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wartas')->insert([
            [
                'id' => 1,
                'warta_title' => 'Download Warta Gereja 19/04/2025',
                'warta_file' => 'warta-190425.pdf',
                'user_id' => 1
            ],
            [
                'id' => 2,
                'warta_title' => 'Download Warta Gereja 19/04/2025',
                'warta_file' => 'warta-190425.pdf',
                'user_id' => 1
            ],
        ]);
    }
}
