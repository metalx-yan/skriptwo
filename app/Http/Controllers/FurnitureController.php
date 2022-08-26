<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FurnitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $all = Product::all();
        $all = Product::where('category_id', 3)->get();

        return view('furnitures.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('furnitures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $gambar = time().'.'.$image->getClientOriginalExtension();
        // dd(public_path('images').$gambar, $request->all());

        Product::create([
            'image' => $request->image->move('images/',$gambar),
            'header' => $request->header,
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('furnitures.index');
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
        $get = Product::find($id);

        return view('furnitures.edit', compact('get'));
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
        $update = Product::find($id);
        if ($request->image == null) {
        } else {
            unlink($update->image);
            $image = $request->file('image');
            $gambar = time().'.'.$image->getClientOriginalExtension();
            $update->image = $request->image->move('images/',$gambar);
        }
        $update->category_id = $request->category_id;
        $update->header = $request->header;
        $update->deskripsi = $request->deskripsi;
        $update->save();

        return redirect()->route('furnitures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Product::find($id);
        unlink($get->image);
        $get->delete();

        return redirect()->back();
    }
}
