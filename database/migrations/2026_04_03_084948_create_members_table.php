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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained('families')->onDelete('cascade');
            $table->string('kode_keluarga')->nullable();
            $table->string('no_induk')->unique();
            $table->string('nama_pertama');
            $table->string('nama_belakang')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('hubungan_keluarga',2)->nullable();
            $table->string('urutan_keluarga',3)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('status_baptis', ['S', 'B'])->nullable(); // S: Sudah, B: Belum
            $table->string('tempat_baptis')->nullable();
            $table->date('tanggal_baptis')->nullable();
            $table->enum('status_sidi', ['S', 'B'])->nullable();
            $table->string('tempat_sidi')->nullable();
            $table->date('tanggal_sidi')->nullable();
            $table->enum('status_nikah', ['S', 'B'])->nullable();
            $table->date('tgl_nikah_gereja')->nullable();
            $table->date('tgl_nikah_sipil')->nullable();
            $table->string('golongan_darah', 1)->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('gelar')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('tempat_kerja')->nullable();
            $table->text('pengalaman_organisasi')->nullable();
            $table->text('pengalaman_gerejawi')->nullable();
            $table->string('penguasaan_bahasa_daerah')->nullable();
            $table->string('penguasaan_bahasa_asing')->nullable();
            $table->string('telp')->nullable();
            $table->string('hp')->nullable();
            $table->string('email')->nullable();
            $table->string('posisi_jabatan')->nullable();
            $table->string('pengurus_pelkat')->nullable();
            $table->string('profesi')->nullable();
            $table->text('riwayat_lain')->nullable();
            $table->text('kompetensi_skill')->nullable();
            $table->string('status_pindah_meninggal')->nullable();
            $table->date('tanggal_pindah_meninggal')->nullable();
            $table->string('dari_jemaat')->nullable();
            $table->string('dari_sektor')->nullable();
            $table->string('ke_jemaat')->nullable();
            $table->string('ke_sektor')->nullable();
            $table->date('tanggal_terdaftar')->nullable();
            $table->boolean('status_aktif')->default(true);
            $table->string('pelkat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
