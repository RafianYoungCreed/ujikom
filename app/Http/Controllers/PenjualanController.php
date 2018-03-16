<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\penjualan;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penjualan=penjualan::all();
        return view('penjualan.index', compact('penjualan'));
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
        $penjualan= penjualan::all();
        return view('penjualan.create', compact('penjualan','barang'));
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
        $barang=barang::findOrFail($request->barang_id);

        $total=$request->jumlah * $barang->harga;

        $penjualan = new penjualan;
        $penjualan->barang_id = $request->barang_id;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->total = $total;
        $penjualan->tgl_penjualan = $request->tgl_penjualan;
        $penjualan->save();
        return redirect('penjualan');
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
        $penjualan = penjualan::findOrFail($id);
        $barang = barang::all();
        return view('penjualan.edit', compact('barang','penjualan'));
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
        $barang=barang::findOrFail($request->barang_id);

        $total=$request->jumlah * $barang->harga;

        $penjualan = penjualan::findOrFail($id);
        $penjualan->barang_id = $request->barang_id;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->total = $total;
        $penjualan->tgl_penjualan = $request->tgl_penjualan;
        $penjualan->save();

        $barang-> barang::find($request->barang_id);
        $barang->jumlah = $barang->jumlah - $request->jumlah;
        $barang->save();
        return redirect('penjualan');
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
        $penjualan = penjualan::findOrFail($id);
        $penjualan->delete();
        return redirect('penjualan');

    }
}
