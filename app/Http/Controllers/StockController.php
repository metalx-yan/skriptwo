<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Stock::all();
        return view('stocks.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Stock::create([
            'nopo' => $request->nopo,
            'tanggalpo' => $request->tanggalpo,
            'nomorbarang' => $request->nomorbarang,
            'namabarang' => $request->namabarang,
            'kuantitas' => $request->kuantitas,
            'supplier' => $request->supplier,
        ]);

        return redirect()->route('stocks.index');
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
        $get = Stock::find($id);
        return view('stocks.edit', compact('get'));
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
        $update = Stock::find($id);
        $update->nopo = $request->nopo;
        $update->tanggalpo = $request->tanggalpo;
        $update->namabarang = $request->namabarang;
        $update->nomorbarang = $request->nomorbarang;
        $update->kuantitas = $request->kuantitas;
        $update->supplier = $request->supplier;
        $update->save();

        return redirect()->route('stocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Stock::find($id);
        $get->delete();

        return redirect()->back();
    }
}
