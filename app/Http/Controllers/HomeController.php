<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Gambar;
use App\Models\Lelang;
use App\Models\Penawaran;
use App\Models\Masyarakat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $this->middleware('auth:masyarakat');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    // public function home()
    // {
    //     // $lelangs = Lelang::paginate(9);
    //     $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
    //                                 ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
    //                                 ->get();
    //     return view('welcome', compact('lelangs'));
    // }
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



    public function dashboard()
    {
        $penawarans = Penawaran::all();
        return view('backend.dashboard', compact('penawarans'));
    }

    public function home()
    {
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftjoin('penawarans', 'penawarans.id_lelang', '=', 'lelangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->where('lelangs.tgl_mulai', '<', Carbon::now())
                                    ->where('lelangs.tgl_akhir', '>', Carbon::now())
                                    ->where('lelangs.status', '=', 'open')
                                    ->where('gambars.urutan', '=', '0')
                                    ->get();

        return view('welcome', compact('lelangs'));
    }
    
    public function search(Request $request)
    {
        $search = $request->search;

        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->where('barangs.nama_barang', 'like','%' . $search .  '%')
                                    ->where('gambars.urutan', '=', 0)
                                    ->get();
    return view('welcome', compact('lelangs'))->with('i', (request()->input('page', 1) - 1) * 5);
    // return view('welcome', compact('lelangs'));
    }

    public function penawaran($id)
    {
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->get()
                                    // ->reject('harga_awal')
                                    ->where('id', '=', $id);
        //                             // ->find($id);
        return view('front.penawaran', compact('lelangs'));
    }
    // public function tawar($id)
    // {
    //     $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
    //                                 ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
    //                                 ->get()
    //                                 // ->reject('harga_awal')
    //                                 ->where('id', '=', $id);
    //     //                             // ->find($id);
    //     return view('front.penawaran', compact('lelangs'));
    // }


    public function error()
    {
        return abort(403);
    }
    public function coba()
    {
        // dd('gabisa login');
        return view('coba');
    }

    public function pemenang()
    {
        $penawarans = Penawaran::where('id_masyarakat', Auth::user()->id);

        // $lelangs = DB::table('penawra')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
        //                             ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
        //                             ->leftJoin('masyarakats', 'lelangs.id_masyarakat', '=', 'masyarakats.id')
        //                             ->leftjoin('penawarans', 'penawarans.id_lelang', '=', 'lelangs.id')
        //                             ->where('lelangs.status', '=', 'confirmed')
        //                             ->where('id_masyarakat', Auth::user()->id)
        //                             ->get();
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->leftJoin('masyarakats', 'lelangs.id_masyarakat', '=', 'masyarakats.id')
                                    ->leftjoin('penawarans', 'penawarans.id_lelang', '=', 'lelangs.id')
                                    ->where('lelangs.status', '=', 'confirmed')
                                    ->where('masyarakats.id', Auth::user()->id)
                                    ->get();

        return view('front.pemenang', compact('lelangs', 'penawarans'));
        // $penawarans = Penawaran::where('id_masyarakat', Auth::user()->id)->get();
        // $penawarans = Penawaran::all();
        // return view('front.pemenang', compact('penawarans'));

        // $lelangs = Lelang::all();
        // return view('front.pemenang', compact('lelangs'));
    }

    public function riwayat()
    {
        $penawarans = Penawaran::all();
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->get();

        return view('front.riwayat', compact('lelangs', 'penawarans'));
    }
    public function detail()
    {
        // $penawarans = DB::table('penawarans')->where('id_masyarakat', Auth::user()->id)->get();
        $penawarans = Penawaran::where('id_masyarakat', Auth::user()->id)->get();

        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->get();

        return view('front.detail', compact('lelangs', 'penawarans'));
    }
    public function datalelang()
    {
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->where('lelangs.tgl_mulai', '<', Carbon::now())
                                    ->where('lelangs.tgl_akhir', '>', Carbon::now())
                                    ->where('lelangs.status', '=', 'open')
                                    ->where('gambars.urutan', '=', '0')
                                    // ->where('lelangs.status', '=', 'open')
                                    ->get();

        return view('front.datalelang', compact('lelangs'));
    }
}
