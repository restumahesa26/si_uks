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
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petugas_id')->references('id')->on('users');
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->text('keluhan');
            $table->string('keterangan');
            $table->string('terapi');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan');
    }
};
