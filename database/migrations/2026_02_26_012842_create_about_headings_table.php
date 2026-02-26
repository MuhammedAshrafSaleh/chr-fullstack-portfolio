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
        Schema::create('about_headings', function (Blueprint $table) {
            $table->id();
            $table->json('about_numbers_title');
            $table->json('about_numbers_subtitle')->nullable();
            $table->json('testimonials_title');
            $table->json('testimonials_subtitle')->nullable();
            $table->json('about_ceo_title');
            $table->json('about_ceo_subtitle')->nullable();
            $table->json('features_title');
            $table->json('features_subtitle')->nullable();
            $table->json('team_title');
            $table->json('team_subtitle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_headings');
    }
};
