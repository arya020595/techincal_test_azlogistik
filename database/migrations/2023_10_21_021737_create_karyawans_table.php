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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama_karyawan');
            $table->integer('jumlah_kehadiran');
            $table->integer('jumlah_cuti');
            $table->integer('jumlah_lembur');
            $table->integer('total_uang_kehadiran');
            $table->integer('total_uang_lembur');
            $table->integer('total_potongan_absen');
            $table->integer('thp');
            $table->unsignedBigInteger('golongan_id');
            $table->foreign('golongan_id')->references('id')->on('golongans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
