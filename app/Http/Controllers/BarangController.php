<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\Jenbar;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang=barang::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang= barang::all();
        $jenbar= Jenbar::all();
        return view('barang.create', compact('jenbar','barang'));
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
        $this->validate($request, [
            'Merk'=> 'required|unique:barangs,Merk'
            ]);
        $barang = new barang;
        $barang->namabarang = $request->nama;
        $barang->Merk = $request->Merk;
        $barang->harga = $request->harga;
        $barang->jumlah = $request->jumlah;
        $barang->jenbar_id = $request->jenbar_id;
        $barang->save();
        return redirect('barang');
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
        $barang = barang::findOrFail($id);
        $jenbar = Jenbar::all();
        return view('barang.edit', compact('jenbar','barang'));
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
        $this->validate($request, [
            'Merk'=> 'required|unique:barangs,Merk'
            ]);
        $barang =  barang::findOrFail($id);
        $barang->namabarang = $request->nama;
        $barang->Merk = $request->Merk;
        $barang->harga = $request->harga;
        $barang->jumlah = $request->jumlah;
        $barang->jenbar_id = $request->jenbar_id;
        $barang->save();
        return redirect('barang');
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
        $barang = barang::findOrFail($id);
        $barang->delete();
        return redirect('barang');
    }
}
