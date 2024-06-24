<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\bukuModel;

class bukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function getBuku(){
        $buku = bukuModel::get();
        return response()->json($buku);
    }

    public function addBuku(Request $req){
        $validator = Validator::make($req->all(),[
            'nama_buku'=>'required',
            'deskripsi'=>'required',
            'pengarang'=>'required',
            'foto'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }

        $save = bukuModel::create([
            'nama_buku'=>$req->get('nama_buku'),
            'deskripsi'=>$req->get('deskripsi'),
            'pengarang'=>$req->get('pengarang'),
            'foto'=>$req->get('foto')
        ]);

        if($save){
            return response()->json(['status'=>true,'message'=>'Sukses menambah']);
        } else {
            return response()->json(['status'=>false,'message'=>'gagal menambah']);
        }
    }

    public function updateBuku(Request $req, $id){
        $validator = Validator::make($req->all(),[
            'nama_buku'=>'required',
            'deskripsi'=>'required',
            'pengarang'=>'required',
            'foto'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }

        $update = bukuModel::where('id_buku',$id)->update([
            'nama_buku'=>$req->get('nama_buku'),
            'deskripsi'=>$req->get('deskripsi'),
            'pengarang'=>$req->get('pengarang'),
            'foto'=>$req->get('foto')
        ]);

        if($update){
            return response()->json(['status'=>true,'message'=>'Sukses mengganti']);
        } else {
            return response()->json(['status'=>false,'message'=>'Gagal mengganti']);
        }
    }

    public function deleteBuku($id){
        $hapus = bukuModel::where('id_buku',$id)->delete();
        if($hapus){
            return response()->json(['status'=>true,'message'=>'Sukses menghapus']);
        } else{
            return response()->json(['status'=>false,'message'=>'Gagal menghapus']);
        }
    }

    public function getBukuId($id){
        $buku=bukuModel::where('id_buku',$id)->get();
        return response()->json($buku);
    }
}
