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
        Schema::create('project_headings', function (Blueprint $table) {
            $table->id();
            $table->json('details_heading');
            $table->json('details_subheading');
            $table->json('images_heading');
            $table->json('images_subheading');
            $table->json('services_heading');
            $table->json('services_subheading');
            $table->json('plans_heading');
            $table->json('plans_subheading');
            $table->json('location_heading');
            $table->json('location_subheading');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_headings');
    }
};
