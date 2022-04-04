<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'nip' => 'required',
            'password' => 'required|string',
        ]);
        // dd($input);
        
        if(auth()->attempt(array('nip' => $input['nip'], 'password' => $input['password'])))
        {
            if (auth()->user()->role_id == 'R2') {
                return redirect()->route('admin.home')->with('success', 'Sign In Success!');
            }else if(auth()->user()->role_id == 'R1'){
                return redirect()->route('direktur.home')->with('success', 'Sign In Success!');
            }else{ 
                return redirect()->route('perawat.home')->with('success', 'Sign In Success!');
            }
        }else{
            return redirect('/login')->with('warning','NIP dan Password yang anda masukan salah!');
        }
    }
}
