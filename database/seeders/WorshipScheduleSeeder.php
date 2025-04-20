<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorshipScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('worship_schedules')->insert([
            [
                'worship_schedule_name' => 'Ibadah Minggu Pagi',
                'worship_schedule_hour' => '08:00:00',
                'pastor_id' => 1,
                'category_id' => 1,
                'worship_schedule_day' => 'Minggu',
                'worship_schedule_language' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'worship_schedule_name' => 'Ibadah Paskah Malam',
                'worship_schedule_hour' => '18:30:00',
                'pastor_id' => 2,
                'category_id' => 2,
                'worship_schedule_day' => 'Minggu',
                'worship_schedule_language' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'worship_schedule_name' => 'Ibadah Natal Anak',
                'worship_schedule_hour' => '10:00:00',
                'pastor_id' => 1,
                'category_id' => 3,
                'worship_schedule_day' => 'Senin',
                'worship_schedule_language' => 'Inggris',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
