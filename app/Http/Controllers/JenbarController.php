<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenbar;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class JenbarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        $jenbar=jenbar::all();
        return view('jenbar.index', compact('jenbar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenbar=jenbar::all();
        return view('jenbar.create');

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
            'namajenis'=> 'required|unique:jenbars,namajenis'
            ]);
        $jenbar = new jenbar;
        $jenbar->namajenis =$request->namajenis;
        $jenbar->save();
        return redirect('jenbar');
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
         $jenbar = jenbar::findOrFail($id);
        return view('jenbar.edit', compact('jenbar'));
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
            'namajenis'=> 'required|unique:jenbars,namajenis'
            ]);
        $jenbar = jenbar::findOrFail($id);
        $jenbar->namajenis =$request->namajenis;
        $jenbar->save();
        return redirect('jenbar');
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
        $jenbar = jenbar::findOrFail($id);
        $jenbar->delete();
        return redirect('jenbar');
    }
}
