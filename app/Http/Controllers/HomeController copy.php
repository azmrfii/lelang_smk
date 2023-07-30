<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penawaran;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home()
    {
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                        ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                        ->where('lelangs.tgl_mulai', '<', Carbon::now())
                        ->where('lelangs.tgl_akhir', '>', Carbon::now())
                        ->where('lelangs.status', '=', 'open')
                        ->where('gambars.urutan', '=', '0')
                        ->get();

        return view('welcome', compact('lelangs'));
        // return view('home');
    }

    public function riwayat()
    {
        $penawarans = Penawaran::where('id_masyarakat', Auth::user()->id)->get();

        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->get();

        return view('front.detail', compact('lelangs', 'penawarans'));
    }

    public function edit(Request $request, $id)
    {
        $data = Masyarakat::find($id);

        $nik = $request->input('nik');
        $name = $request->input('name');
        $email = $request->input('email');
        $username = $request->input('username');
        $jk = $request->input('jk');
        $no_hp = $request->input('no_hp');
        $alamat = $request->input('alamat');
        
        Masyarakat::where('id', Auth::user()->id)->update([
            'nik' => $nik,
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'jk' => $jk,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
        ]);
        return redirect()->route('home')->with('alert', 'Successfully managed to change the item user !');
    }

    public function editpass(Request $request, $id)
    {
        $masyarakat = Masyarakat::find($id);
 
        $data = $request->validate([
            'password' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        // dd($data);
        $masyarakat->update($data);

        return redirect()->route('home')->with('alert', 'Successfully managed to change the password user !');
    }

    public function penawaran($id)
    {
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->get()
                                    ->where('id', '=', $id);
                                    
        return view('front.penawaran', compact('lelangs'));
    }
}
