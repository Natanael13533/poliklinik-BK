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
        Schema::create('jadwal_periksa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dokter')->required();
            $table->string('hari', 10)->required();
            $table->time('jam_mulai')->required();
            $table->time('jam_selesai')->required();
            $table->timestamps();

            $table->foreign('id_dokter')->references('id')->on('dokter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_periksa');
    }
};
