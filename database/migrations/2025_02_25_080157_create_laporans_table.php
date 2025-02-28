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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_laporan');
            $table->string('pelapor');
            $table->string('judul');
            $table->string('bukti');
            $table->string('deksripsi');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('alamat');
            $table->integer('categories_id')->constrained('categories')->cascadeOnDelete();
            $table->integer('users_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
