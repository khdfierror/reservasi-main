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
        Schema::create('mobil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merek_id');
            $table->foreignId('brand_id');
            $table->foreignId('tipe_id');
            $table->foreignId('tahunproduksi_id');
            $table->foreignId('warna_id');
            $table->string('no_polisi');
            $table->string('no_rangka');
            $table->date('expired_stnk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};
