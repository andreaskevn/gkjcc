<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            InformationCategoriesSeeder::class,
            InformationSeeder::class,
            WartaSeeder::class,
            ChoirSeeder::class,
            BidangsSeeder::class,
            CommisonSeeder::class,
            FormSeeder::class,
            ScholarshipSeeder::class,
            InformationSeeder::class,
            PastorSeeder::class,
            WorshipCategorySeeder::class,
            WorshipScheduleSeeder::class,
            WeeklyScheduleSeeder::class
        ]);
    }
}
