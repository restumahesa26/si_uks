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
        Schema::create('terapi_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemeriksaan_id')->references('id')->on('pemeriksaan');
            $table->foreignId('terapi_id')->references('id')->on('terapi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terapi_pemeriksaan');
    }
};
