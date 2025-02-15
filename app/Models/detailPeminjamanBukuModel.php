<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class detailPeminjamanBukuModel extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman_buku', $primaryKey = 'id_detail_peminjaman_buku';
    public $timestamps = false, $fillable = [
        'id_peminjaman_buku', 'id_buku', 'qty'
    ];
}
