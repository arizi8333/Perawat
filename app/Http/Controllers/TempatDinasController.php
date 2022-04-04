<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatDinas;
use Carbon\Carbon;
use Alert;

class TempatDinasController extends Controller
{
    public function index(){
        return view('admin.Master.tempat_dinas');
    }

    public function data(){
        $TempatDinas = TempatDinas::get();
        return response()->json(['data' => $TempatDinas]);
    }

    public function create(Request $request){
        // dd($request);
        $data = TempatDinas::orderBy('id_tempat_dinas', 'DESC')->first();
        $id;

        if($data == null){
            $id = "TD1";
        }else{
            $newId = substr($data->id_tempat_dinas, 2,1);
            $tambah = (int)$newId + 1;
            $id = "TD" .$tambah;
        }

        TempatDinas::create([
            'id_tempat_dinas' => $id,
            'lokasi' => $request->lokasi
        ]);

        return redirect()->route('lokasi.index')->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit($id){
        $TempatDinas = TempatDinas::where('id_tempat_dinas',$id)->get();
        return $TempatDinas->toJson();
    }

    public function update(Request $request, $id){
        $TempatDinas = TempatDinas::where('id_tempat_dinas', $id)->first();

        $TempatDinas->lokasi  = $request->lokasi;
        
        $TempatDinas->save();

        return redirect()->route('lokasi.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id){
        TempatDinas::where('id_tempat_dinas', $id)->delete();
    }
}
