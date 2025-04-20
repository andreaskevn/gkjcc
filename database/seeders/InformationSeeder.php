<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('informations')->insert([
            [
                'information_title' => 'Pendaftaran Ulang Mahasiswa',
                'information_description' => 'Pendaftaran ulang dibuka hingga tanggal 30 September. Segera daftar ulang di portal akademik.',
                'information_head_cover' => 'pendaftaran-ulang.jpg',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'information_title' => 'Peringatan Hari Kemerdekaan',
                'information_description' => 'Kegiatan upacara 17 Agustus akan dilaksanakan di lapangan utama pukul 07.00 WIB.',
                'information_head_cover' => 'kemerdekaan.jpg',
                'user_id' => 2,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'information_title' => 'Lowongan Dosen Tetap',
                'information_description' => 'Universitas membuka lowongan untuk posisi dosen tetap berbagai jurusan.',
                'information_head_cover' => 'lowongan-dosen.jpg',
                'user_id' => 1,
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
