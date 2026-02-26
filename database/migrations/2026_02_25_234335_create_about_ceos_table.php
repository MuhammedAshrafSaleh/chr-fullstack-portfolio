<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_ceo', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('paragraph_one');
            $table->json('paragraph_two')->nullable();
            $table->json('paragraph_three')->nullable();
            $table->json('ceo_name');
            $table->json('ceo_title');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_ceo');
    }
};
