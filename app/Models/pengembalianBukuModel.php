<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class pengembalianBukuModel extends Model
{
    use HasFactory;
    protected $table = 'pengembalian_buku', $primaryKey = 'id_pengembalian_buku';
    public $timestamps = false, $fillable = [
        'id_peminjaman_buku', 'tanggal_pengembalian', 'denda'
    ];
}
