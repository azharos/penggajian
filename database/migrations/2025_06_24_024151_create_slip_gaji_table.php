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
        Schema::create('slip_gaji', function (Blueprint $table) {
            $table->id();
            $table->integer('id_payroll_run')->nullable();
            $table->integer('id_karyawan')->nullable();
            $table->string('gaji_pokok')->nullable();
            $table->string('total_tunjangan')->nullable();
            $table->string('total_potongan')->nullable();
            $table->string('penghasilan_bruto')->nullable();
            $table->string('pph21_terpotong')->nullable();
            $table->string('total_iuran_bpjs_karyawan')->nullable();
            $table->string('thp')->nullable();
            $table->json('detail_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slip_gaji');
    }
};
