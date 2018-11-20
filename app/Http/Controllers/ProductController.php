<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Jenis;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $jenis = Jenis::all();
        $category = Category::all();
        return view('layouts.admin.product', compact('product', 'jenis', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [

            'product' => 'required|string|min:5',
            'foto' => 'required|mimes:jpg,png,jpeg',
            'jenis' => 'required',
            'category' => 'required',
            'harga' => 'required|numeric',
            'size' => 'required',
            'deskripsi' => 'min:5',

        ]);

        $data = new Product;
        $data->product = $request->product;
        $data->foto = $request->foto;
        $data->jenis = $request->jenis;
        $data->category = $request->category;
        $data->harga = $request->harga;
        $data->size = $request->size;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        return redirect()->route('product')->with('success', 'Data Berhasil Ditambahkan');
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
}
