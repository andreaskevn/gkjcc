<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('commissions')->insert([
            [
                'commission_name' => 'Komisi Anak',
                'commission_description' => 'Komisi yang fokus pada pertumbuhan iman anak-anak.',
                'commission_description_2' => 'Kegiatan meliputi sekolah minggu, perayaan Natal Anak, dan retret anak.',
                'commission_head_cover' => 'anak-head.jpg',
                'commission_pict' => 'anak-pict.jpg',
                'user_id' => 1,
                'bidang_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'commission_name' => 'Komisi Pemuda',
                'commission_description' => 'Komisi yang melayani kaum muda dan remaja.',
                'commission_description_2' => 'Kegiatan seperti youth camp, pelayanan masyarakat, dan fellowship.',
                'commission_head_cover' => 'pemuda-head.jpg',
                'commission_pict' => 'pemuda-pict.jpg',
                'user_id' => 2,
                'bidang_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
