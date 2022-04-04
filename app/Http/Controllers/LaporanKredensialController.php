<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RequestKredensial;
use App\Models\DetailKewenangan;
use PDF;

class LaporanKredensialController extends Controller
{
    public function LaporanPembuatanKredensial(){
        if(auth()->user()->role_id == 'R2'){
            return view('admin.Kredensial.laporan');
        }else if(auth()->user()->role_id == 'R1'){
            return view('direktur.Laporan.index');
        }
    }

    public function RiwayatKredensialPerawat(){
        if(auth()->user()->role_id == 'R2'){
            return view('admin.Kredensial.Riwayat.riwayat');
        }else if(auth()->user()->role_id == 'R1'){
            return view('direktur.Riwayat.riwayat');
        }
    }

    public function DetailRiwayatKredensialPerawat($id){
        if(auth()->user()->role_id == 'R2'){
            $user = User::where('nip',$id)->with('role','perawat_klinik')->first();
            return view('admin.Kredensial.Riwayat.detail_riwayat', compact('user'));
        }else if(auth()->user()->role_id == 'R1'){
            $user = User::where('nip',$id)->with('role','perawat_klinik')->first();
            return view('direktur.Riwayat.detail_riwayat', compact('user'));
        }
    }

    public function DetailKewenanganKredensialPerawat($id){
        $decrypted_string = str_replace('_', '/', $id);
        $data = DetailKewenangan::where('credential_id',$decrypted_string)->with('kewenangan_klinis','request_credentials.user','request_credentials.jenis_kredensial','request_credentials.tempat_dinas')->get();
        if(auth()->user()->role_id == 'R2'){
            return view('admin.Kredensial.Riwayat.kewenangan', compact('data'));
        }else if(auth()->user()->role_id == 'R1'){
            return view('direktur.Riwayat.kewenangan', compact('data'));
        }
    }

    public function data_DetailRiwayatKredensialPerawat($id){
        $RequestKredensial = RequestKredensial::where('status',2)->where('nip', $id)->with('tempat_dinas','jenis_kredensial')->get();
        return response()->json(['data' => $RequestKredensial]);
    }

    public function spk_rkk(){
        if(auth()->user()->role_id == 'R2'){
            return view('admin.Kredensial.spk-rkk');
        }else if(auth()->user()->role_id == 'R3'){
            return view('perawat.Riwayat.spk-rkk');
        }
    }

    public function data_spk_rkk(){
        if(auth()->user()->role_id == 'R2'){
            $RequestKredensial = RequestKredensial::where('status',2)->with('user','tempat_dinas','jenis_kredensial')->get();
            return response()->json(['data' => $RequestKredensial]);
        }else if(auth()->user()->role_id == 'R3'){
            $nip = auth()->user()->nip;
            $RequestKredensial = RequestKredensial::where('nip',$nip)->where('status',2)->with('user','tempat_dinas','jenis_kredensial')->get();
            return response()->json(['data' => $RequestKredensial]);
        }
    }

    public function cetak_spk($id){
        $dirut = User::where('role_id',"R1")->with('role')->first();
        $decrypted_string = str_replace('_', '/', $id);
        $datas = RequestKredensial::where('id_kredensial',$decrypted_string)->with('user.perawat_klinik','tempat_dinas')->first();
        $pdf = PDF::loadView('cetak_spk', compact('datas','dirut'))->setPaper('a4', 'potrait');

        return $pdf->stream();
    }

    public function cetak_rkk($id){
        $dirut = User::where('role_id',"R1")->first();
        $decrypted_string = str_replace('_', '/', $id);
        $datas = RequestKredensial::where('id_kredensial',$decrypted_string)->with('user.perawat_klinik','tempat_dinas')->first();
        $kewenangan = DetailKewenangan::where('credential_id', $decrypted_string)->with('kewenangan_klinis')->get();
        // return view('cetak_rkk', compact('datas','kewenangan'));
        $pdf = PDF::loadView('cetak_rkk', compact('datas','kewenangan','dirut'))->setPaper('a4', 'potrait');

        return $pdf->stream();
    }

    public function data_laporan($id, $id1){
        if($id1 == '00'){
            $data = RequestKredensial::where('status',2)->whereYear('tgl_request_kredensial',$id)->with('tempat_dinas','user.perawat_klinik','jenis_kredensial')->get();
        }else{
            $data = RequestKredensial::where('status',2)->whereYear('tgl_request_kredensial',$id)->whereMonth('tgl_request_kredensial', $id1)->with('tempat_dinas','user.perawat_klinik','jenis_kredensial')->get();
        }
        return $data->toJson();
    }
}
