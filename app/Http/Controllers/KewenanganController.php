<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KewenanganKlinik;
use App\Models\PerawatKlinik;
use App\Models\DetailKewenangan;
use Carbon\Carbon;
use Alert;

class KewenanganController extends Controller
{
    public function index(){
        if(auth()->user()->role_id == 'R2'){
            $pk = PerawatKlinik::all();
            return view('admin.Master.kewenangan', compact('pk'));
        }else if(auth()->user()->role_id == 'R3'){
            $pk = KewenanganKlinik::with('perawat_klinis')->get();
            $kk = PerawatKlinik::whereNotIn('id_perawat_klinik',['PK0'])->get();
            return view('perawat.kewenangan', compact('pk','kk'));
        }
    }

    public function data(){
        $KewenanganKlinik = KewenanganKlinik::with('perawat_klinis')->get();
        return response()->json(['data' => $KewenanganKlinik]);
    }

    public function create(Request $request){
        // dd($request);
        $data = KewenanganKlinik::orderBy('id_kewenangan', 'DESC')->first();
        $id;

        if($data == null){
            $id = "K01";
        }else{
            $newId = substr($data->id_kewenangan, 1,2);
            $tambah = (int)$newId + 1;
            if (strlen($tambah) == 1){
                $id = "K0" .$tambah;
            }else if (strlen($tambah) == 2){
                $id = "K" .$tambah;
            }
        }

        KewenanganKlinik::create([
            'id_kewenangan' => $id,
            'perawat_klinik_id' => $request->perawat_klinik_id,
            'rincian_kewenangan' => $request->rincian_kewenangan,
            'jenis_kewenangan' => $request->jenis_kewenangan,
        ]);

        return redirect()->route('kewenangan.index')->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit($id){
        $Kewenangan = KewenanganKlinik::where('id_kewenangan',$id)->get();
        return $Kewenangan->toJson();
    }

    public function update(Request $request, $id){
        $Kewenangan = KewenanganKlinik::where('id_kewenangan', $id)->first();

        $Kewenangan->perawat_klinik_id  = $request->perawat_klinik_id;
        $Kewenangan->rincian_kewenangan  = $request->rincian_kewenangan;
        $Kewenangan->jenis_kewenangan  = $request->jenis_kewenangan;

        $Kewenangan->save();

        return redirect()->route('kewenangan.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id){
        KewenanganKlinik::where('id_kewenangan', $id)->delete();
    }

    // Unit Kompetensi

    public function unitkompetensi($id){
        $decrypted_string = str_replace('_', '/', $id);
        $data = DetailKewenangan::where('credential_id', $decrypted_string)->with('request_credentials','kewenangan_klinis')->get();
        return view('admin.UnitKompetensi.index', compact('data'));
    }

    public function update_unitkompetensi(Request $request){
        foreach($request->kewenangan_id as $key => $r){
            DetailKewenangan::where('credential_id', $request->kredensial_id)->where('kewenangan_id', $r)->update([
                'keterangan' => $request->nilai[$key],
            ]);
        }
        $decrypted_string = str_replace('_', '/', $request->kredensial_id);

        return redirect()->route('DetailRiwayatKredensialPerawat', $decrypted_string);
    }
}
