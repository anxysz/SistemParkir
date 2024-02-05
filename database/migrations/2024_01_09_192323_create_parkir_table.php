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
        Schema::create('parkir', function (Blueprint $table) {
            $table->id();
            $table->string('kode_karcis',10)->unique();
            $table->string('nomor_plat',20);
            $table->string('jenis',10);
            $table->timestamp('waktu_masuk')->default(now());;
            $table->timestamp('waktu_keluar')->nullable();;
            $table->string('penjaga',10);
            $table->string('lokasi',10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkir');
    }
};
