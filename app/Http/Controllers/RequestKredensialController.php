<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\RequestKredensial;
use App\Models\DetailPersyaratan;
use App\Models\DetailKewenangan;
use App\Models\JenisKredential;
use App\Models\KewenanganKlinik;
use App\Models\PerawatKlinik;
use App\Models\Persyaratan;
use App\Models\TempatDinas;
use App\Models\User;
use Carbon\Carbon;
use Alert;

class RequestKredensialController extends Controller
{
    public function index(){
        if(auth()->user()->role_id == 'R2'){
            $persyaratan = JenisKredential::all();
            return view('admin.Kredensial.request_kredensial', compact('persyaratan'));
        }else if(auth()->user()->role_id == 'R1'){
            return view('direktur.Kredensial.index');
        }else if(auth()->user()->role_id == 'R3'){
            $persyaratan = JenisKredential::all();
            return view('perawat.Kredensial.index', compact('persyaratan'));
        }
    }

    public function data(){
        if(auth()->user()->role_id == 'R2'){
            $RequestKredensial = RequestKredensial::whereNotIn('status',[2,3])->with('user','tempat_dinas','jenis_kredensial')->get();
            return response()->json(['data' => $RequestKredensial]);
        }else if(auth()->user()->role_id == 'R1'){
            $RequestKredensial = RequestKredensial::where('status',1)->with('user','tempat_dinas','jenis_kredensial')->get();
            return response()->json(['data' => $RequestKredensial]);
        }else if(auth()->user()->role_id == 'R3'){
            $nip = auth()->user()->nip;
            $RequestKredensial = RequestKredensial::where('nip',$nip)->whereNotIn('status',[2])->with('user','tempat_dinas','jenis_kredensial')->get();
            return response()->json(['data' => $RequestKredensial]);
        }
    }

    public function create(Request $request){
        $persyaratan = Persyaratan::where('jenis_kredensial_id',$request->jenis_kredensial)->get();
        $tempatdinas = TempatDinas::all();
        $perawatklinik = PerawatKlinik::all();
        if(auth()->user()->role_id == 'R2'){
            $user = User::all();
            return view('admin.Kredensial.FormKredensial.addKredensial', compact('persyaratan','tempatdinas','user','perawatklinik'));
        }else if(auth()->user()->role_id == 'R3'){
            return view('perawat.Kredensial.FormKredensial.addKredensial', compact('persyaratan','tempatdinas','perawatklinik'));
        }
    }

    public function store(Request $request){
        // dd($request->file('file')[2]);
        $data = RequestKredensial::orderBy('id_kredensial', 'DESC')->first();
        $id;

        $tahun = Carbon::now()->format('Y');

        if($data == null){
            $id = "KP.03.01/I/001/" .$tahun;
        }else{
            $newId = substr($data->id_kredensial, 11,3);
            $tambah = (int)$newId + 1;
            if (strlen($tambah) == 1){
                $id = "KP.03.01/I/00" .$tambah. "/" . $tahun;
            }else if (strlen($tambah) == 2){
                $id = "KP.03.01/I/0" .$tambah . "/" . $tahun;
            }else{
                $id = "KP.03.01/I/" .$tambah. "/" . $tahun;
            }
        }
        $now = Carbon::now()->format('Y-m-d H:i:s');

        RequestKredensial::create([
            'id_kredensial' => $id,
            'nip' => $request->nip,
            'tempat_dinas_id' => $request->tempat_dinas_id,
            'jenis_kredensial_id' => $request->jenis_kredensial_id,
            'tgl_request_kredensial' => $now,
            'tgl_terbit_surat' => null,
            'tgl_habis_berlaku' => null,
            'status' => 0,
            'ttd' => null,
        ]);

        $count = count($request->file);
        for ($i=0; $i<$count; $i++){
            $file = $request->file('file')[$i];
            if ($file != null){
                if ($file->isValid()) {
                    $path = $file->store('public/syarat');
                    DetailPersyaratan::create([
                        'credential_id' => $id,
                        'persyaratan_id' => $request->persyaratan_id[$i],
                        'file' => $path,
                        'status' => 0,
                        'note' => null,
                    ]);
                }
            }
        }
        if($request->perawat_klinik != null){
            $kewenangan = KewenanganKlinik::where('perawat_klinik_id', $request->perawat_klinik)->get();
            foreach($kewenangan as $a){
                DetailKewenangan::create([
                    'credential_id' => $id,
                    'kewenangan_id' => $a->id_kewenangan,
                    'keterangan' => null
                ]);
            }
        }else{
            $syarat = User::where('nip', $request->nip)->first();
            $kewenangan = KewenanganKlinik::where('perawat_klinik_id', $syarat->perawat_klinik_id)->get();
            foreach($kewenangan as $a){
                DetailKewenangan::create([
                    'credential_id' => $id,
                    'kewenangan_id' => $a->id_kewenangan,
                    'keterangan' => null
                ]);
            }
        }
        if(auth()->user()->role_id == 'R2'){
            return redirect()->route('request-kredensial.index')->with('success', 'Data Berhasil Di Simpan');
        }else if(auth()->user()->role_id == 'R3'){
            return redirect()->route('request-kredensial.perawat')->with('success', 'Data Berhasil Di Simpan');
        }
    }

    public function detail($id){
        $decrypted_string = str_replace('_', '/', $id);
        // echo $decrypted_string;
        $data = RequestKredensial::where('id_kredensial',$decrypted_string)->with('user','tempat_dinas','jenis_kredensial')->first();
        if(auth()->user()->role_id == 'R2'){
            return view('admin.Kredensial.FormKredensial.detail', compact('data'));
        }else if(auth()->user()->role_id == 'R3'){
            return view('perawat.Kredensial.FormKredensial.detail', compact('data'));
        }
    }

    public function edit($id){
        $RequestKredensial = RequestKredensial::where('id_kredensial',$id)->get();
        return $RequestKredensial->toJson();
    }

    public function update(Request $request, $id){
        // $RequestKredensial = RequestKredensial::where('id_kredensial', $id)->first();

        // $RequestKredensial->lokasi  = $request->lokasi;
        
        // $RequestKredensial->save();

        // return redirect()->route('request-kredensial.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id){
        $decrypted_string = str_replace('_', '/', $id);
        RequestKredensial::where('id_kredensial', $decrypted_string)->delete();
    }

    public function action($id, $id1){
        $decrypted_string = str_replace('_', '/', $id);

        RequestKredensial::where('id_kredensial', $decrypted_string)->update([
            'status' => $id1, 
        ]);

        return redirect()->route('request-kredensial.index');
        // dd($request);w
    }

    public function upload_ttd(Request $request, $id){
        $decrypted_string = str_replace('_', '/', $id);

        $mulai = Carbon::now()->format('Y-m-d');
        $habis = Carbon::now()->addYears(3)->format('Y-m-d');
    
        $file = $request->file('file');
            if ($file != null){
                if ($file->isValid()) {
                    $k = DetailKewenangan::where('credential_id', $decrypted_string)->first();
                    $kk = KewenanganKlinik::where('id_kewenangan', $k->kewenangan_id)->first();

                    $user = RequestKredensial::where('id_kredensial', $decrypted_string)->first();
                    
                    User::where('nip', $user->nip)->update([
                        'perawat_klinik_id' => $kk->perawat_klinik_id,
                    ]);
                    
                    $path = $file->store('public/ttd');
                    RequestKredensial::where('id_kredensial', $decrypted_string)->update([
                        'status' => 2, 
                        'ttd' => $path,
                        'tgl_terbit_surat' => $mulai,
                        'tgl_habis_berlaku' => $habis,
                    ]);
                }
            }

        return redirect()->route('request-kredensial.index');
    }

    public function berkas_update(Request $request){
        // dd($request);
        $file = $request->file('file');
        if ($file != null){
            if ($file->isValid()) {
                $path = $file->store('public/syarat');
                // echo $path;
                DetailPersyaratan::where('credential_id', $request->id_kredensial)->where('persyaratan_id', $request->syarat_id)
                ->update([
                    'file' => $path,
                    'status' => 0, 
                ]);
                RequestKredensial::where('id_kredensial', $request->id_kredensial)->update([
                    'status' => 0,
                ]);
            }
        }

        return redirect()->route('request-kredensial.index');
    }
}
