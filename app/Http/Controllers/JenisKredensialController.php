<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKredential;
use Carbon\Carbon;
use Alert;

class JenisKredensialController extends Controller
{
    public function index(){
        return view('admin.Master.jenis_kredensial');
    }

    public function data(){
        $JenisKredential = JenisKredential::get();
        return response()->json(['data' => $JenisKredential]);
    }

    public function create(Request $request){
        // dd($request);
        $data = JenisKredential::orderBy('id_jenis_kredensial', 'DESC')->first();
        $id;

        if($data == null){
            $id = "K1";
        }else{
            $newId = substr($data->id_jenis_kredensial, 1,1);
            $tambah = (int)$newId + 1;
            $id = "K" .$tambah;
        }

        JenisKredential::create([
            'id_jenis_kredensial' => $id,
            'nama_jenis' => $request->nama_jenis
        ]);

        return redirect()->route('jenis-kredensial.index')->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit($id){
        $JenisKredential = JenisKredential::where('id_jenis_kredensial',$id)->get();
        return $JenisKredential->toJson();
    }

    public function update(Request $request, $id){
        $JenisKredential = JenisKredential::where('id_jenis_kredensial', $id)->first();

        $JenisKredential->nama_jenis  = $request->nama_jenis;
        
        $JenisKredential->save();

        return redirect()->route('jenis-kredensial.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id){
        JenisKredential::where('id_jenis_kredensial', $id)->delete();
    }
}
