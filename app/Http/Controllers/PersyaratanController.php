<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persyaratan;
use App\Models\JenisKredential;
use Carbon\Carbon;
use Alert;

class PersyaratanController extends Controller
{
    public function index(){
        if(auth()->user()->role_id == 'R2'){
            $jk = JenisKredential::all();
            return view('admin.Master.persyaratan', compact('jk'));
        }else if(auth()->user()->role_id == 'R3'){
            $jk = JenisKredential::get();
            $kk = Persyaratan::get();
            return view('perawat.persyaratan', compact('jk','kk'));
        }
    }

    public function data(){
        $Persyaratan = Persyaratan::with('jenis_kredensial')->get();
        return response()->json(['data' => $Persyaratan]);
    }

    public function create(Request $request){
        // dd($request);
        $data = Persyaratan::orderBy('id_persyaratan', 'DESC')->first();
        $id;

        if($data == null){
            $id = "S01";
        }else{
            $newId = substr($data->id_persyaratan, 2,1);
            $tambah = (int)$newId + 1;
            if (strlen($tambah) == 1){
                $id = "S0" .$tambah;
            }else if (strlen($tambah) == 2){
                $id = "S" .$tambah;
            }
        }

        Persyaratan::create([
            'id_persyaratan' => $id,
            'jenis_kredensial_id' => $request->jenis_kredensial_id,
            'nama_persyaratan' => $request->nama_persyaratan,
        ]);

        return redirect()->route('persyaratan.index')->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit($id){
        $Persyaratan = Persyaratan::where('id_persyaratan',$id)->get();
        return $Persyaratan->toJson();
    }

    public function update(Request $request, $id){
        $Persyaratan = Persyaratan::where('id_persyaratan', $id)->first();

        $Persyaratan->nama_persyaratan  = $request->nama_persyaratan;
        $Persyaratan->jenis_kredensial_id  = $request->jenis_kredensial_id;
        
        
        $Persyaratan->save();

        return redirect()->route('persyaratan.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id){
        Persyaratan::where('id_persyaratan', $id)->delete();
    }
}
