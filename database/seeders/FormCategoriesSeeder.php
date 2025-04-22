<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('form_categories')->insert([
            [
                'form_category_name' => 'Sakramen Baptis',
            ],
            [
                'form_category_name' => 'Sakramen Pernikahan',
            ]
        ]);
    }
}
