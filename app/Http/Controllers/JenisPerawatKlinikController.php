<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerawatKlinik;
use Carbon\Carbon;
use Alert;

class JenisPerawatKlinikController extends Controller
{
    public function index(){
        return view('admin.Master.perawat_klinik');
    }

    public function data(){
        $PerawatKlinik = PerawatKlinik::get();
        return response()->json(['data' => $PerawatKlinik]);
    }

    public function create(Request $request){
        // dd($request);
        $data = PerawatKlinik::orderBy('id_perawat_klinik', 'DESC')->first();
        $id;

        if($data == null){
            $id = "PK1";
        }else{
            $newId = substr($data->id_perawat_klinik, 2,1);
            $tambah = (int)$newId + 1;
            $id = "PK" .$tambah;
        }

        PerawatKlinik::create([
            'id_perawat_klinik' => $id,
            'jabatan' => $request->jabatan
        ]);

        return redirect()->route('perawat-klinik.index')->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit($id){
        $PerawatKlinik = PerawatKlinik::where('id_perawat_klinik',$id)->get();
        return $PerawatKlinik->toJson();
    }

    public function update(Request $request, $id){
        $PerawatKlinik = PerawatKlinik::where('id_perawat_klinik', $id)->first();

        $PerawatKlinik->jabatan  = $request->jabatan;
        
        $PerawatKlinik->save();

        return redirect()->route('perawat-klinik.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id){
        PerawatKlinik::where('id_perawat_klinik', $id)->delete();
    }
}
