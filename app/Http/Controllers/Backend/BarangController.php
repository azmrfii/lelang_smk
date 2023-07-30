<?php

namespace App\Http\Controllers\Backend;

use App\Models\Barang;
use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        $gambars = Gambar::all();

        return view('backend.barang.index', compact('barangs', 'gambars'));
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
        $data = $request->all();

        $barangs = new Barang;
        $barangs->nama_barang = $data['nama_barang'];
        $barangs->deskripsi = $data['deskripsi'];
        $barangs->harga_awal = $data['harga_awal'];

        // ddd($barangs);
        $barangs->save();

        $datagambar = new Gambar;

        if($request->file('gambar')) {
            $datagambar['gambar'] = $request->file('gambar')->store('gambar-barang');
        }
        $datagambar->id_barang = $barangs->id;
        $datagambar->gambar = $datagambar['gambar'];
        $datagambar->nama_gambar = $barangs->nama_barang;

        // ddd($datagambar, $barangs);
        $datagambar->save();

        return redirect()->route('barang.index')->with('alert', 'Successfully Added barang !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangs = DB::table('barangs')->leftJoin('gambars', 'barangs.id', '=', 'gambars.id_barang')
        ->where('barangs.id', '=', $id)
        ->get();
        // return view('backend.barang.show',compact('gambar', 'barang'));
        return view('backend.barang.show',compact('barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gambars = Gambar::find($id);
        $barang = Barang::find($id);

        return view('backend.barang.edit', compact('barang', 'gambars'));
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
        $barang = Barang::find($id);

        $nama_barang = $request->input('nama_barang');
        $deskripsi = $request->input('deskripsi');
        $harga_awal = $request->input('harga_awal');

        $data = [
            'nama_barang' => $nama_barang,
            'deskripsi' => $deskripsi,
            'harga_awal' => $harga_awal,
        ];

        $barang->update($data);
        // For Gambar
        $datagambar = Gambar::find($id);

        $datagambar->nama_gambar = $barang->nama_barang;
        
        $valid = [
            'gambar' => 'required',
            'nama_gambar' => $datagambar->nama_gambar,
        ];

        if($request->file('gambar')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $valid['gambar'] = $request->file('gambar')->store('gambar-barang');
        }
        
        $datagambar->update($valid);

        return redirect()->route('barang.index')->with('alert', 'Successfully managed to change item !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datagambar = Gambar::find($id);

        if($datagambar->gambar) {
            Storage::delete($datagambar->gambar);
        }
        
        $datagambar->barang()->delete();
        
        return redirect()->route('barang.index')->with('alert', 'Successfully drop item !');
    }

    public function delete($id)
    {
        $datagambar = Gambar::find($id);

        if($datagambar->gambar) {
            Storage::delete($datagambar->gambar);
        }
        
        $datagambar->delete();
        
        return redirect()->route('barang.index')->with('alert', 'Successfully drop item !');
    }





    public function image($id)
    {
        $gambars = Gambar::find($id);
        $barang = Barang::find($id);
        return view('backend.barang.image', compact('barang', 'gambars'));
    }

    public function postimage(Request $request, $id)
    {   
        // $data = $request->all();
        // dd($data);

        $barang = Barang::find($id);

        $datagambar = new Gambar;
        if($request->file('gambar')) {
            $datagambar['gambar'] = $request->file('gambar')->store('gambar-barang');
        }
        $datagambar->id_barang = $barang->id;
        $datagambar->gambar = $datagambar['gambar'];
        $datagambar->nama_gambar = $barang->nama_barang;
        // $datagambar->urutan = $datagambar;

        $datagambar->save();

        return redirect()->route('barang.index')->with('alert', 'Successfully Added image !');
    }
}
