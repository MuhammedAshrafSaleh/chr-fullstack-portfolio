<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('construction_update_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('construction_update_id')->constrained('construction_updates')->cascadeOnDelete();
            $table->json('head');
            $table->json('subhead');
            $table->string('media')->nullable();
            $table->string('youtube_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('construction_update_projects');
    }
};
