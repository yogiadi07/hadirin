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
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggota');
            $table->date('tanggal');
            $table->time('jam_masuk')->nullable();
            $table->timestamps();
        
            $table->foreign('id_anggota')->references('id')->on('anggotas')->onDelete('cascade');
            $table->unique(['id_anggota', 'tanggal']); // Satu kehadiran per hari per anggota
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadirans');
    }
};
