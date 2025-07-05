<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_pemakaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kendaraan_id')->constrained()->onDelete('cascade');
            $table->foreignId('pemesan_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('driver_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->string('lokasi_awal');
            $table->string('lokasi_tujuan');
            $table->integer('km_awal');
            $table->integer('km_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pemakaians');
    }
};
