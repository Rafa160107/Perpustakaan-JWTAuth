<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class bukuModel extends Model
{
    use HasFactory;

    protected $table = 'buku', $primaryKey = 'id_buku';
    public $timestamps = false, $fillable = [
        'nama_buku', 'pengarang', 'deskripsi', 'foto'
    ];
}
