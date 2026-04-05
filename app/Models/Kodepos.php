<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kodepos extends Model
{
    protected $table = 'kodepos'; // Nama tabel Anda
    public $incrementing = false; // Karena primary key bukan auto-increment int
    protected $primaryKey = 'code'; // Menjadikan kolom 'code' sebagai key utama

    protected $fillable = ['code', 'village', 'district', 'regency', 'province'];
}
