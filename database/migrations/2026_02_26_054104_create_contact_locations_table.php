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
        Schema::create('contact_locations', function (Blueprint $table) {
            $table->id();

            // Location One
            $table->json('location_one_title');
            $table->json('location_one_address_one');
            $table->json('location_one_address_two')->nullable();
            $table->json('location_one_address_three')->nullable();
            $table->string('location_one_navigate_url', 2048)->nullable();

            // Location Two
            $table->json('location_two_title');
            $table->json('location_two_address_one');
            $table->json('location_two_address_two')->nullable();
            $table->json('location_two_address_three')->nullable();
            $table->string('location_two_navigate_url', 2048)->nullable();

            // Phone
            $table->string('phone', 50);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_locations');
    }
};
