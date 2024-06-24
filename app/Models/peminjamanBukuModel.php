<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class peminjamanBukuModel extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_buku', $primaryKey = 'id_peminjaman_buku';
    public $timestamps = false, $fillable = [
        'id_siswa', 'tanggal_pinjam', 'tanggal_kembali'
    ];
}
