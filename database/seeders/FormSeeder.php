<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('forms')->insert([
            [
                'form_name' => 'Form Baptis Anak',
                'form_file' => 'form-baptis-anak.doc',
                'form_category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'form_name' => 'Form Baptis Dewasa',
                'form_file' => 'form-baptis-dewasa.doc',
                'form_category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'form_name' => 'Form Baptis Pernikahan',
                'form_file' => 'form-baptis-pernikahan.doc',
                'form_category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
