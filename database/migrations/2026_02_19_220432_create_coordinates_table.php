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
        Schema::create('coordinates', function (Blueprint $blade) {
            $blade->id();
            // decimal(10,7) covers -90 to 90 for lat and -180 to 180 for lang with high precision
            $blade->decimal('lat', 10, 7);
            $blade->decimal('lang', 10, 7);
            $blade->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordinates');
    }
};
