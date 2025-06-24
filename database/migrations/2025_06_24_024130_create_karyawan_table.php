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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jabatan');
            $table->integer('id_departemen');
            $table->string('nama_lengkap')->nullable();
            $table->string('nik_ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('status_ptkp')->nullable();
            $table->date('tanggal_bergabung')->nullable();
            $table->string('gaji_pokok')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('status_kepegawaian')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
