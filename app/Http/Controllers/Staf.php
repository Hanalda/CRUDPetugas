<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
class Staf extends Controller
{
    public function get_staf(){
        $data["stafs"] = Petugas::all();
        return view("staf",$data);
    }

    public function save(Request $request){
        $action = $request->action;
        if ($action == "insert"){
            $petugas = new Petugas();
            $petugas->nama_petugas = $request->nama_petugas;
            $petugas->no_karyawan = $request->no_karyawan;
            $petugas->tanggal_lahir = $request->tanggal_lahir;
            $petugas->kelamin = $request->kelamin;
            $petugas->save();
        }else if($action == "update"){
            $petugas = Petugas::where("id", $request->id)->first();
            $petugas->nama_petugas = $request->nama_petugas;
            $petugas->no_karyawan = $request->no_karyawan;
            $petugas->tanggal_lahir = $request->tanggal_lahir;
            $petugas->kelamin = $request->kelamin;
            $petugas->save();
        }
        return redirect("staf")->with("message","Data berhasil disimpan!");
    }

    public function delete($id){
        Petugas::where("id", $id)->delete();
        return redirect("staf")->with("message", "Data berhasil dihapus!");
    }
}
