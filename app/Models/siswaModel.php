<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kelasModel;
use Illuminate\Foundation\Auth\User as Authenticatable;
class siswaModel extends Model
{
    use HasFactory;

    protected $table = "siswa", $primaryKey = "id_siswa";
    public $timestamps = false, $fillable = [
        'nama_siswa', 'tanggal_lahir', 'gender', 'alamat', 'username', 'pass', 'id_kelas'
    ];

    public function kelas(){
        return $this->belongsTo(kelasModel::class, 'id_kelas', 'id_kelas');
    }
}
