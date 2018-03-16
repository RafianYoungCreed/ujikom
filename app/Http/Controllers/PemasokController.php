<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pemasok;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;


class PemasokController extends Controller
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
        return view('pemasok.index', compact('pemasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pemasok.create');
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
            'namapemasok'=> 'required|unique:pemasoks,namapemasok'
            ]);
        $pemasok = new pemasok;
        $pemasok->namapemasok = $request->namapemasok;
        $pemasok->alamat = $request->alamat;
        $pemasok->kota = $request->kota;
        $pemasok->no_telp = $request->no_telp;
        $pemasok->no_pax = $request->no_pax;
        $pemasok->save();
        return redirect('pemasok');
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
         $pemasok = pemasok::findOrFail($id);
        return view('pemasok.edit', compact('pemasok'));
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
            'namapemasok'=> 'required|unique:pemasoks,namapemasok'
            ]);
        $pemasok = pemasok::findOrFail($id);
        $pemasok->namapemasok = $request->namapemasok;
        $pemasok->alamat = $request->alamat;
        $pemasok->kota = $request->kota;
        $pemasok->no_telp = $request->no_telp;
        $pemasok->no_pax = $request->no_pax;
        $pemasok->save();
        return redirect('pemasok');
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
        $pemasok = pemasok::findOrFail($id);
        $pemasok->delete();
        return redirect('pemasok');
    }
}
