<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataParkirTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_parkir', function (Blueprint $table) {
            $table->id();
            // $table->integer('no');
            $table->string('lokasi_parkir');
            $table->integer('kapasitas');
            $table->enum('aksi', ['masuk', 'keluar']); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_parkir');
    }
};
