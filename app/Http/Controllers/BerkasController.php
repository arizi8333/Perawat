<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\RequestKredensial;
use App\Models\DetailPersyaratan;
use \File;

class BerkasController extends Controller
{
    public function databerkas($id){
        $decrypted_string = str_replace('_', '/', $id);
        $berkas = DetailPersyaratan::where('credential_id', $decrypted_string)->with('persyaratan')->get();
        return response()->json(['data' => $berkas]);
    }

    public function cekberkas($id, $id1){
        $decrypted_string = str_replace('_', '/', $id);
        $file = DetailPersyaratan::where([
            ['credential_id', '=' , $decrypted_string], 
            ['persyaratan_id','=', $id1 ]
        ])->first();

        // echo $file;
        $path = storage_path('app/'. $file->file);
        
        return response()->file($path);
    }

    public function actionberkas(Request $request){
        // $decrypted_string = str_replace('_', '/', $request->id_kredensial);
        $data = DetailPersyaratan::where([
            ['credential_id', '=' , $request->id_kredensial], 
            ['persyaratan_id','=', $request->syarat_id]
        ]);
        $data->update([
            'status' => $request->status,
            'note' => $request->note,
        ]);

        return back();
    }
}
