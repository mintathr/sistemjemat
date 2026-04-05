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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('kode_keluarga')->unique();
            $table->string('nama_keluarga');
            $table->date('tgl_pendataan')->nullable();
            $table->date('tgl_daftar')->nullable();
            $table->integer('kode_mupel')->nullable(); // Anggap saja int 2
            $table->integer('kode_jemaat')->nullable(); // Anggap saja int 2
            $table->string('sektor',1)->nullable();
            $table->string('rt',3)->nullable();
            $table->string('rw',3)->nullable();
            $table->string('kompleks_perumahan')->nullable();
            $table->text('alamat')->nullable();
            $table->unsignedBigInteger('provincy_id')->nullable();
            $table->unsignedBigInteger('regency_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->string('kodepos', 5)->nullable();
            $table->string('telp_rumah')->nullable();
            $table->string('status_keluarga')->nullable();
            $table->integer('kode_amplop')->nullable(); // Untuk isi 3 digit
            $table->text('catatan_khusus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
