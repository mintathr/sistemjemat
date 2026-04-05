<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_keluarga',
        'nama_keluarga',
        'tgl_pendataan',
        'tgl_daftar',
        'kode_mupel',
        'kode_jemaat',
        'sektor',
        'alamat',
        'rt',
        'rw',
        'kompleks_perumahan',
        'alamat',
        'provincy_id',
        'regency_id',
        'district_id',
        'village_id',
        'kodepos',
        'telp_rumah',
        'status_keluarga',
        'kode_amplop',
        'catatan_khusus',
    ];

    // Relasi: Satu keluarga memiliki banyak anggota (members)
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function wilayah()
    {
        // Family punya kodepos yang merujuk ke 'code' di tabel Kodepos
        return $this->belongsTo(Kodepos::class, 'kodepos', 'code');
    }
}
