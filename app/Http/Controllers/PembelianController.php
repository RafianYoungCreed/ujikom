<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\pembelian;
use App\pemasok;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pemasok=pemasok::all();
        $barang=barang::all();
        $pembelian=pembelian::all();
        return view('pembelian.index', compact('pemasok','barang','pembelian'));
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
        $pemasok= pemasok::all();
        $pembelian= pembelian::all();
        return view('pembelian.create', compact('pembelian','pemasok','barang'));
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

        $pembelian = new pembelian;
        $pembelian->barang_id = $request->barang_id;
        $pembelian->pemasok_id = $request->pemasok_id;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->total = $total;
        $pembelian->tgl_pembelian = $request->tgl_pembelian;
        $pembelian->save();
        return redirect('pembelian');
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
        $pembelian = pembelian::findOrFail($id);
        $pemasok= pemasok::all();
        $barang= barang::all();
        return view('pembelian.edit', compact('pembelian','pemasok','barang'));
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

        $pembelian = pembelian::findOrFail($id);
        $pembelian->barang_id = $request->barang_id;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->total = $total;
        $pembelian->tgl_pembelian = $request->tgl_pembelian;
        $pembelian->pemasok_id = $request->pemasok_id;
        $pembelian->save();
        return redirect('pembelian');
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
        $pembelian = pembelian::findOrFail($id);
        $pembelian->delete();
        return redirect('pembelian');
    }
}
