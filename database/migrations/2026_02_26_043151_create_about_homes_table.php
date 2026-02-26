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
        Schema::create('about_home', function (Blueprint $table) {
            $table->id();
            $table->json('section_label');
            $table->json('title');
            $table->json('description');
            $table->integer('years_count');
            $table->json('years_label');
            $table->integer('projects_count');
            $table->json('projects_label');
            $table->integer('workers_count');
            $table->json('workers_label');
            $table->json('feature_one');
            $table->json('feature_two');
            $table->json('feature_three');
            $table->json('feature_four')->nullable();
            $table->json('feature_five')->nullable();
            $table->string('image_right')->nullable();
            $table->string('image_left')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_home');
    }
};
