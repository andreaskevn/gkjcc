<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scholarships')->insert([
            [
                'scholarship_title' => 'Beasiswa Prestasi Akademik',
                'scholarship_description' => 'Beasiswa ini diberikan kepada mahasiswa dengan IPK minimal 3.75 selama 2 semester berturut-turut.',
                'scholarship_head_cover' => 'prestasi.jpg',
                'scholarship_phone' => '081234567890',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'scholarship_title' => 'Beasiswa Bantuan UKT',
                'scholarship_description' => 'Bantuan pembiayaan UKT untuk mahasiswa yang terdampak kondisi ekonomi.',
                'scholarship_head_cover' => 'bantuan-ukt.jpg',
                'scholarship_phone' => '089876543210',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
