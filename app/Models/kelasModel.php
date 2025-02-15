<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class kelasModel extends Model
{
    use HasFactory;

    protected $table = 'kelas', $primaryKey = 'id_kelas';
    public $timestamps = false, $fillable = [
        'nama_kelas', 'kelompok', 'angkatan'
    ]; 
}
