<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeeklyScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weekly_schedules')->insert([
            [
                'weekly_schedule_name' => 'Latihan Paduan Suara',
                'weekly_schedule_hour' => '19:00:00',
                'weekly_schedule_day' => 'Rabu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'weekly_schedule_name' => 'Pemuda Remaja',
                'weekly_schedule_hour' => '17:30:00',
                'weekly_schedule_day' => 'Jumat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'weekly_schedule_name' => 'Pendalaman Alkitab',
                'weekly_schedule_hour' => '18:00:00',
                'weekly_schedule_day' => 'Selasa',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
