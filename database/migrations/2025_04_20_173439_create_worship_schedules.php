<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('worship_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('worship_schedule_name');
            $table->time('worship_schedule_hour');
            $table->foreignId('pastor_id')->constrained(
                table: 'pastors'
            );
            $table->foreignId('category_id')->constrained(
                table: 'worship_schedule_categories'
            );
            $table->string('worship_schedule_day');
            $table->string('worship_schedule_language');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worship_schedule');
    }
};
