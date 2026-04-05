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
        Schema::create('kodepos', function (Blueprint $table) {
            $table->id();
            // Gunakan string untuk kode pos karena bisa diawali angka 0
            $table->string('code', 5)->index(); 
            $table->string('village')->nullable();
            $table->string('district')->nullable();
            $table->string('regency')->nullable();
            $table->string('province')->nullable();
            
            // Koordinat menggunakan decimal untuk akurasi pemetaan
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            
            $table->integer('elevation')->nullable();
            $table->string('timezone', 5)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kodepos');
    }
};
