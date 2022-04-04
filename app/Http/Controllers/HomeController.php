<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestKredensial;
use App\Models\Persyaratan;
Use Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function komiteindex()
    {
        $pending = RequestKredensial::where('status',0)->count();
        $progress = RequestKredensial::where('status',1)->count();
        $finished = RequestKredensial::where('status',2)->count();
        $persyaratan = Persyaratan::where('jenis_kredensial_id', 'K1')->with('jenis_kredensial')->get();
        $persyaratan1 = Persyaratan::where('jenis_kredensial_id', 'K2')->with('jenis_kredensial')->get();
        $persyaratan2 = Persyaratan::where('jenis_kredensial_id', 'K3')->with('jenis_kredensial')->get();
        return view('admin.main', compact('pending', 'progress', 'finished','persyaratan','persyaratan1','persyaratan2'));
    }

    public function direkturHome()
    {
        $pending = RequestKredensial::where('status',0)->count();
        $progress = RequestKredensial::where('status',1)->count();
        $finished = RequestKredensial::where('status',2)->count();
        return view('direktur.main', compact('pending', 'progress', 'finished'));
    }

    public function perawatHome()
    {
        $nip = auth()->user()->nip;
        $pending = RequestKredensial::where('nip',$nip)->where('status',0)->count();
        $progress = RequestKredensial::where('nip',$nip)->where('status',1)->count();
        $finished = RequestKredensial::where('nip',$nip)->where('status',2)->count();
        return view('perawat.main', compact('pending', 'progress', 'finished'));
    }
}
