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
        Schema::create('choirs', function (Blueprint $table) {
            $table->id();
            $table->string('choir_name');
            $table->longText('choir_description');
            $table->string('choir_head_cover');
            $table->longText('choir_description_2');
            $table->string('choir_pict')->nullable();
            $table->foreignId('user_id')->constrained(
                table: 'users'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choirs');
    }
};
