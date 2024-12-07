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
        Schema::create('periksa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_daftar_poli')->required();
            $table->date('tgl_periksa')->required();
            $table->text('catatan')->required();
            $table->integer('biaya_periksa')->required();
            $table->timestamps();

            $table->foreign('id_daftar_poli')->references('id')->on('daftar_poli')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periksa');
    }
};
