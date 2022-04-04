<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\PerawatKlinik;
use App\Models\RequestKredensial;
use Carbon\Carbon;
use Alert;

class UserController extends Controller
{
    public function index(){
        $role = Role::all();
        $pk = PerawatKlinik::all();
        return view('admin.Master.user', compact('role','pk'));
    }

    public function data(){
        $user = User::with('perawat_klinik')->get();
        return response()->json(['data' => $user]);
    }

    public function data_perawat(){
        $user = User::where('role_id','R3')->with('perawat_klinik')->get();
        return response()->json(['data' => $user]);
    }

    public function create(Request $request){
        // dd($request);
        $now = Carbon::now()->format('Y-m-d H:i:s');

        User::create([
            'nip' => $request->nip,
            'role_id' => $request->role,
            'perawat_klinik_id' => $request->perawat_klinik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'golongan' => $request->golongan,
            'pangkat' => $request->pangkat,
            'mulai_dinas' => $request->mulai_dinas,
            'pendidikan' => $request->pendidikan,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'email_verified_at' => $now,
        ]);

        return redirect()->route('user.index')->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit($id){
        $user = User::where('nip',$id)->get();
        return $user->toJson();
    }

    public function update(Request $request, $id){
        $user = User::where('nip', $id)->first();

        $user->nip = $request->nip;
        $user->role_id = $request->role;
        $user->perawat_klinik_id = $request->perawat_klinik;
        $user->nama = $request->nama;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->golongan = $request->golongan;
        $user->pangkat = $request->pangkat;
        $user->mulai_dinas = $request->mulai_dinas;
        $user->pendidikan = $request->pendidikan;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id){
        User::where('nip', $id)->delete();
    }

    public function profile(){
        $nip = auth()->user()->nip;
        $data = User::where('nip',$nip)->with('perawat_klinik','role')->first();
        return $data->toJson();
    }

    public function notif(){
        $nip = auth()->user()->nip;
        if(auth()->user()->role_id == "R1"){

            $data = RequestKredensial::where('status',1)->with('jenis_kredensial')->get();
            return $data->toJson();

        }else if(auth()->user()->role_id == "R2"){

            $data = RequestKredensial::where('status',0)->with('jenis_kredensial')->get();
            return $data->toJson();

        }else if(auth()->user()->role_id == "R3"){

            $data = RequestKredensial::where('nip',$nip)->whereNotIn('status',[[0,2]])->with('jenis_kredensial')->get();
            return $data->toJson();

        }
    }
}
