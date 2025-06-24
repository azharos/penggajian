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
        Schema::create('payroll_run', function (Blueprint $table) {
            $table->id();
            $table->string('periode_gaji')->nullable();
            $table->timestamp('tanggal_eksekusi')->nullable();
            $table->string('status')->nullable();
            $table->integer('dieksekusi_oleh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_run');
    }
};
