<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }
    public function show()
    {
        return view('auth.login');
    }


    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // Check login as web
        if(Auth::attempt($credentials))
        // if(Auth::guard('web')->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        elseif(Auth::guard('masyarakat')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        // Email notification not found
        return back()->withErrors([
            'email' => 'We did not find your email.',
        ])->onlyInput('email');
    }
// 
    public function MasyarakatLogin(Request $request)
    {
        // $masyarakat = Masyarakat::all();
        // $data = $request->all();

        $cred = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if(Auth::guard('masyarakat')->attempt($cred)) {
            // dd($cred);
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    // Function Register Masyarakat
    public function register(Request $request)
    {
        $data = $request->all();

        $date = Carbon::now();

        $masyarakat = new Masyarakat();
        $masyarakat->email = $data['email'];
        $masyarakat->password = Hash::make($data['password']);
        $masyarakat->nik = $data['nik'];
        $masyarakat->name = $data['name'];
        $masyarakat->username = $data['username'];
        $masyarakat->jk = $data['jk'];
        $masyarakat->no_hp = $data['no_hp'];
        $masyarakat->alamat = $data['alamat'];
        $masyarakat->tgl_join = $date->toDateTimeString();

        // ddd($masyarakat);
        $masyarakat->save();
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();    
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
}
