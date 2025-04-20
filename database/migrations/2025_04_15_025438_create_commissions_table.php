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
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->string('commission_name');
            $table->string('commission_description');
            $table->string('commission_head_cover');
            $table->string('commission_description_2');
            $table->string('commission_pict');
            $table->foreignId('user_id')->constrained(
                table: 'users'
            );
            $table->foreignId('bidang_id')->constrained(
                table: 'bidangs'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
