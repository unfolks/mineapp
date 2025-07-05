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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_polisi')->unique();
            $table->enum('jenis', ['orang', 'barang']);
            $table->enum('status_kepemilikan', ['milik', 'sewa']);
            $table->foreignId('perusahaan_sewa_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('kantor_id')->constrained()->onDelete('cascade');
            $table->string('merk');
            $table->string('tipe')->nullable();
            $table->year('tahun')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
