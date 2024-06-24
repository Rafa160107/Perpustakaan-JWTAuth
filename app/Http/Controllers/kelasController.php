<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\kelasModel;
class kelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    //
    public function getKelas(){
        $dt_kelas = kelasModel::get();
        return response()->json($dt_kelas);
    }

    public function addKelas(Request $req){
        $validator = Validator::make($req->all(),[
            "nama_kelas"=>"required",
            "kelompok"=>"required",
            "angkatan"=>"required"
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }

        $save = kelasModel::create([
            "nama_kelas"=>$req->get("nama_kelas"),
            "kelompok"=>$req->get("kelompok"),
            "angkatan"=>$req->get("angkatan")
        ]);

        if($save){
            return response()->json(["status"=>true,"message"=>"Sukses menambah kelas"]);
        } else {
            return response()->json(["status"=>false,"message"=>"gagal menambah kelas"]);
        }
    }

    public function updateKelas(Request $req,$id){
        $validator = Validator::make($req->all(),[
            "nama_kelas"=>"required",
            "kelompok"=>"required",
            "angkatan"=>"required"
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }

        $update = kelasModel::where("id_kelas",$id)->update([
            "nama_kelas"=>$req->get("nama_kelas"),
            "kelompok"=>$req->get("kelompok"),
            "angkatan"=>$req->get("angkatan")
        ]);

        if($update){
            return response()->json(["status"=>true,"message"=>"Sukses mengganti"]);
        } else {
            return response()->jsont(["status"=>true,"message"=>"Gagal mengganti"]);
        }
    }

    public function deleteKelas($id){
        $hapus=kelasModel::where("id_kelas",$id)->delete();
        if($hapus){
            return response()->json(["status"=>true,"message"=>"sukses menghapus"]);
        } else{
            return response()->json(["status"=>false,"message"=>"gagal menghapus"]);
        }
    }

    public function getKelasId($id){
        $dt=kelasModel::where("id_kelas",$id)->first();
        return response()->json($dt);
    }
}
