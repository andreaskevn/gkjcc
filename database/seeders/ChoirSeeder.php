<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChoirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('choirs')->insert([
            [
                'choir_name' => 'Pendaftaran Ulang Mahasiswa',
                'choir_description' => 'Pendaftaran ulang dibuka hingga tanggal 30 September. Segera daftar ulang di portal akademik.',
                'choir_description_2' => 'Ini deskripsi 2.',
                'choir_head_cover' => 'pendaftaran-ulang.jpg',
                'choir_pict' => 'pendaftaran-ulang.jpg',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'choir_name' => 'Peringatan Hari Kemerdekaan',
                'choir_description' => 'Kegiatan upacara 17 Agustus akan dilaksanakan di lapangan utama pukul 07.00 WIB.',
                'choir_description_2' => 'Ini deskripsi 2.',
                'choir_head_cover' => 'kemerdekaan.jpg',
                'choir_pict' => 'pendaftaran-ulang.jpg',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
