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
        Schema::create('data_sektor_osses', function (Blueprint $table) {
            $table->id();
            $table->integer('data_sektor_ossable_id');
            $table->string('data_sektor_ossable_type');
            $table->unsignedBigInteger('jumlah_data_sektor');
            $table->foreignId('sektor_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sektor_osses');
    }
};
