<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_id',
        'kode_keluarga',
        'no_induk',
        'nama_pertama',
        'nama_belakang',
        'jenis_kelamin',
        'hubungan_keluarga',
        'urutan_keluarga',
        'tempat_lahir',
        'tanggal_lahir',
        'status_baptis',
        'tempat_baptis',
        'tanggal_baptis',
        'status_sidi',
        'tempat_sidi',
        'tanggal_sidi',
        'status_nikah',
        'tgl_nikah_gereja',
        'tgl_nikah_sipil',
        'golongan_darah',
        'pendidikan_terakhir',
        'gelar',
        'jurusan',
        'pekerjaan',
        'tempat_kerja',
        'pengalaman_organisasi',
        'pengalaman_gerejawi',
        'penguasaan_bahasa_daerah',
        'penguasaan_bahasa_asing',
        'telp',
        'hp',
        'email',
        'posisi_jabatan',
        'pengurus_pelkat',
        'profesi',
        'riwayat_lain',
        'kompetensi_skill',
        'status_pindah_meninggal',
        'tanggal_pindah_meninggal',
        'dari_jemaat',
        'dari_sektor',
        'ke_jemaat',
        'ke_sektor',
        'tanggal_terdaftar',
        'status_aktif',
        'pelkat',
    ];

    // umur
    public function getUmurAttribute()
    {
        if (!$this->tanggal_lahir) {
            return null;
        }
        return Carbon::parse($this->tanggal_lahir)->age; 
        // tidak perlu getUmurAttribute karena $member->tanggal_lahir->age sudah mengembalikan umur dalam tahun secara otomatis
        // $member->umur ini bila menggunakan getUmurAttribute
        // $member->tanggal_kahir->age ini bila menggunakan $casts untuk tanggal_lahir sebagai date, maka kita bisa langsung akses $member->tanggal_lahir->age tanpa perlu getUmurAttribute
    }

    // Casts untuk memastikan tipe data konsisten saat diakses
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_baptis' => 'date',
        'tanggal_sidi' => 'date',
        'tgl_nikah_gereja' => 'date',
        'tgl_nikah_sipil' => 'date',
        'tanggal_pindah_meninggal' => 'date',
        'tanggal_terdaftar' => 'date',
    ];

    protected function kategori(): Attribute
    {
        return Attribute::make(
            get: function () {
                $usia = $this->tanggal_lahir?->age;
                $jk = $this->jenis_kelamin; // Sesuaikan nama kolom di DB (male/female atau L/P)
                $status = trim($this->status_nikah); // Asumsi: 00 = Belum Nikah, 01 = Sudah Nikah, 02 = janda, 03 = duda

                if ($usia === null) return '-';

                // 0 - 12 Tahun
                if ($usia <= 12) return 'PA';

                // 13 - 18 Tahun
                if ($usia <= 18) return 'PT';

                // 19 - 35 Tahun
                if ($usia >= 19 && $usia <= 35) {
                    #if ($status === '00' || is_null($status)) return 'GP';
                    if ($status == '00' || $status == '' || is_null($status)) {
                        return 'GP';
                    }
                    return ($jk === 'L') ? 'PKB' : 'PKP';
                }
                
                // 36 - 60 Tahun
                if ($usia >= 36 && $usia <= 60) {
                    return ($jk === 'L') ? 'PKB' : 'PKP';
                }

                // > 61 Tahun
                return 'PKLU';
            }
        );
    }

    // Relasi: Anggota ini milik keluarga siapa?
    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
