<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Penawaran;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Cache\RateLimiting\Limit;

class PenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penawarans = DB::table('penawarans')->join('lelangs', 'penawarans.id_lelang', '=', 'lelangs.id')
                                    ->where('harga_penawaran', '>', 'lelangs.harga_awal')
        //                             ->limit(1)
                                    ->get();

                                    // dd($penawarans);
        //  $penawarans = Penawaran::all();
        // $penawarans = Penawaran::all()->groupBy('id_lelang')
        //                             ->orderBy('harga_penawaran', 'desc');
        // $masyarakat = Masyarakat::all();
        return view('backend.penawaran.index', compact('penawarans', 'masyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function riwayat()
    {
        $penawarans = Penawaran::all();
        return view('backend.penawaran.index', compact('penawarans'));
    }
    
    public function pemenang()
    {
        $lelangs = Lelang::all();
        return view('backend.penawaran.pemenang', compact('lelangs'));
    }

    public function tawar()
    {
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
        ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
        ->get();
        return view('backend.penawaran.tawar', compact('lelangs'));
    }

    public function cobatawar()
    {
        $lelangs = Lelang::all();
        $barang = Barang::all();
        return view('backend.penawaran.tawar', compact('lelangs', 'barang'));
    }

    public function gotawar(Request $request)
    {
        $data = $request->all();
        // return $request;

        $date = Carbon::now();

        $penawaran = new Penawaran;
        $penawaran->id_lelang = $data['id_lelang'];
        $penawaran->harga_penawaran = $data['harga_penawaran'];
        $penawaran->tgl_penawaran = $date->toDateTimeString();
        $penawaran->id_masyarakat = Auth()->user()->id;

        // ddd($penawaran);
        $penawaran->save();
        
        return redirect()->route('home')->with('alert', 'bisa');
    }

    public function table()
    {
        return view('backend.penawaran.table');
    }

    public function confirm($id)
    {
        $penawarans = Penawaran::find($id);
        $lelangs = Lelang::find($id);
        $date = Carbon::now();

        $dt = Lelang::where('id', '=', $penawarans->id)->update([
            'id_masyarakat' => $penawarans->id_masyarakat,
            'harga_akhir' => $penawarans->harga_penawaran,
            'confirm_date' => $date->toDateTimeString(), 
            'status' => 'confirmed',
        ]);
         return redirect()->route('pemenanglelang')->with('alert', 'Successfully confirm lelang !');
    }
}
