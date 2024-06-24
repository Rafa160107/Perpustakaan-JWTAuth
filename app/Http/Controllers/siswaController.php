<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\siswaModel;


class siswaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login', 'register']]);
    // }
    public function getSiswa(){
        $dt_siswa = siswaModel::with('kelas')->get();
        return response()->json($dt_siswa);
    }

    public function addSiswa(Request $req){
        $validator = Validator::make($req->all(),[
            'nama_siswa'=>'required',
            'tanggal_lahir'=> 'required',
            'gender'=>'required',
            'alamat'=>'required',
            'username'=>'required',
            'pass'=>'required',
            'id_kelas'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }

        $save = siswaModel::create([
            'nama_siswa'=>$req->get('nama_siswa'),
            'tanggal_lahir'=> $req->get('tanggal_lahir'),
            'gender'=>$req->get('gender'),
            'alamat'=>$req->get('alamat'),
            'username'=>$req->get('username'),
            'pass'=>$req->get('pass'),
            'id_kelas'=>$req->get('id_kelas')
        ]);

        if($save){
            return response()->json(['status'=>true,'message'=>'Sukses Menambah Siswa']);
        } else {
            return response()->json(['status'=>true,'message'=>'Gagal Menambah Siswa']);
        }
        
    }

    public function updateSiswa(Request $req, $id){
        $validator = Validator::make($req->all(),[
            'nama_siswa'=>'required',
            'tanggal_lahir'=> 'required',
            'gender'=>'required',
            'alamat'=>'required',
            'username'=>'required',
            'pass'=>'required',
            'id_kelas'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }
        $ubah=siswaModel::where('id_siswa', $id)->update([
            'nama_siswa'=>$req->get('nama_siswa'),
            'tanggal_lahir'=> $req->get('tanggal_lahir'),
            'gender'=>$req->get('gender'),
            'alamat'=>$req->get('alamat'),
            'username'=>$req->get('username'),
            'pass'=>$req->get('pass'),
            'id_kelas'=>$req->get('id_kelas')
        ]);
        if($ubah){
            return response()->json(['status'=>true,'message'=>'Sukses mengubah data']);
        } else {
            return response()->json(['status'=>false,'message'=>'Gagal mengubah data']);
        }
    }

    public function deleteSiswa($id){
        $hapus=siswaModel::where('id_siswa', $id)->delete();
        if($hapus){
            return response()->json(['status'=>true,'message'=>'Sukses menghapus data']);
        } else {
            return response()->json(['status'=>false,'message'=>'Gagal menghapus data']);
        }
    }

    public function getSiswaId($id){
        $dt=siswaModel::where('id_siswa', $id)->with('kelas')->first();
        return response()->json($dt);
    }
}
