<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorshipCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('worship_schedule_categories')->insert([
            [
                'id' => 1,
                'worship_schedule_category_name' => 'Ibadah Mingguan'
            ],
            [
                'id' => 2,
                'worship_schedule_category_name' => 'Ibadah Paskah'
            ],
            [
                'id' => 3,
                'worship_schedule_category_name' => 'Ibadah Natal'
            ],
            [
                'id' => 4,
                'worship_schedule_category_name' => 'Ibadah Advent'
            ],
            [
                'id' => 5,
                'worship_schedule_category_name' => 'Ibadah Pentakosta'
            ],
        ]);
    }
}
