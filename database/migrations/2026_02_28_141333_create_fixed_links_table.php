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
        Schema::create('fixed_links', function (Blueprint $table) {
            $table->id();
            $table->string('logo_image');
            $table->string('logo_link');
            $table->string('whatsapp_image');
            $table->string('whatsapp_link');
            $table->string('location_image');
            $table->string('location_link');
            $table->string('hotline_image');
            $table->string('hotline_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixed_links');
    }
};
