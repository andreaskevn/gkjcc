<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class InformationCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('information_categories')->insert([
            [
                'id' => 1,
                'information_category_name' => 'Pengumuman'
            ],
            [
                'id' => 2,
                'information_category_name' => 'Berita'
            ],
            [
                'id' => 3,
                'information_category_name' => 'Info Lowongan'
            ],
        ]);
    }
}
