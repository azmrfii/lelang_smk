<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lelangs = Lelang::all();
        $barangs = Barang::all();
        $masyarakats = Masyarakat::all();
        $user = User::all();
      
        return view('backend.lelang.index', compact('lelangs','barangs','masyarakats','user'));
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
        $lelang = new Lelang;
        
        $date = Carbon::now();

        $lelang->id_barang = $request->input('id_barang');
        $lelang->tgl_mulai = $request->input('tgl_mulai');
        if($lelang->tgl_akhir < $lelang->tgl_mulai){
            // $request->input('tgl_akhir');
            return redirect()->route('lelang.index');
        }
        $lelang->tgl_akhir = $request->input('tgl_akhir');
        $lelang->created_by = Auth()->user()->id;
        $lelang->created_date = $date->toDateTimeString();
       
        // dd($lelang);
        $lelang->save();

        return redirect()->route('lelang.index');
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
        $lelang = Lelang::find($id);
        return view('backend.lelang.edit', compact('lelang'));
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
        $lelangs = Lelang::find($id);

        $data = $request->validate([
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
        ]);

        $lelangs->update($data);

        return redirect()->route('lelang.index')->with('alert', 'Successfully managed to change the date lelang !');
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

    public function cancel($id)
    {
        $lelang = Lelang::find($id);
        Lelang::where('id','=', $id)->update([
            'status' => 'cancel' #cancel lelang
        ]);
        $status = 'cancel';

        if(Lelang::where('status','=', $status))
        {
            Barang::where('id', $lelang->id_barang, $id)->update([
                'status' => 'new' #cancel lelang
            ]);
        }
        return redirect()->route('lelang.index')->with('alert', 'Successfully canceled lelang !');
    }
    public function closed($id)
    {
        $lelang = Lelang::find($id);
        Lelang::where('id','=', $id)->update([
            'status' => 'closed' #cancel lelang
        ]);
        $status = 'closed';

        if(Lelang::where('status','=', $status))
        {
            Barang::where('id', $lelang->id_barang, $id)->update([
                'status' => 'sold' #cancel lelang
            ]);
        }
        return redirect()->route('lelang.index')->with('alert', 'Successfully closed lelang !');
    }
    public function open($id)
    {
        $lelang = Lelang::find($id);
        Lelang::where('id','=', $id)->update([
            'status' => 'open' #cancel lelang
        ]);
        $status = 'open';

        if(Lelang::where('status','=', $status))
        {
            Barang::where('id', $lelang->id_barang, $id)->update([
                'status' => 'process' #cancel lelang
            ]);
        }
        return redirect()->route('lelang.index')->with('alert', 'Successfully opened lelang !');
    }
}
