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
        Schema::create('lapor_izin_osses', function (Blueprint $table) {
            $table->id();
            $table->string('berkas');
            $table->string('jenis_oss');
            $table->string('bulan');
            $table->string('tahun');
            $table->unsignedBigInteger('jumlah_data');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapor_izin_osses');
    }
};
