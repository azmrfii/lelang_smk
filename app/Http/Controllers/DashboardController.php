<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lelang;
use App\Models\Penawaran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $lelangs = Lelang::all();
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
        ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
        ->where('lelangs.tgl_mulai', '<', Carbon::now())
        ->where('lelangs.tgl_akhir', '>', Carbon::now())
        ->where('lelangs.status', '=', 'open')
        ->get();
        // return redirect()->route('homemasyarakat');
        return view('welcome', compact('lelangs'));
    }

    public function dashboard()
    {
        $lelang = Lelang::all();
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
        ->where('lelangs.tgl_mulai', '<', Carbon::now())
        ->where('lelangs.tgl_akhir', '>', Carbon::now())
        ->where('lelangs.status', '=', 'open')
        ->get();

        $penawarans = Penawaran::all();

        return view('backend.dashboard', compact('lelangs', 'penawarans', 'lelang'));
    }

    public function editacc(Request $request, $id)
    {
        $data = User::find($id);

        $nip = $request->input('nip');
        $name = $request->input('name');
        $email = $request->input('email');
        $username = $request->input('username');
        $level = $request->input('level');
        
        User::where('id', Auth::user()->id)->update([
            'nip' => $nip,
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'level' => $level,
        ]);
        return redirect()->route('dashboard')->with('alert', 'Successfully managed to change the item user !');
    }
}
