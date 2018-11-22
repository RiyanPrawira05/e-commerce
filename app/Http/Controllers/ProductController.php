<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Jenis;
use App\Category;
use App\Size;
use File;

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
        $size = Productsize::all();
        return view('backend.product.index', compact('product', 'jenis', 'category', 'size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $jenis = Jenis::all();
        $category = Category::all();
        $size = Size::all();
        return view('backend.product.create', compact('product', 'jenis', 'category', 'size'));
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

            'product' => 'required|string|min:4',
            'foto' => 'required|mimes:jpg,png,jpeg,gif|max:4000',
            'jenis' => 'required',
            'category' => 'required',
            'harga' => 'required|numeric',
            'size' => 'required',
            'deskripsi' => 'string|min:3',

        ]);

        $data = new Product;
        $data->product = $request->product;
        
        if ($request->foto) {

            $foto = $request->foto;
            $extension = $foto->getClientOriginalExtension();
            $folder = 'berkas/product';
            $newName = rand(100000,1001238912).$extension;
            if (!is_dir($folder)) {
                File::makeDirectory($folder,0777,true);
            }
            $foto->move($folder, $newName);
            $data->foto = $newName;
        } 

        $data->jenis = $request->jenis;
        $data->category = $request->category;
        $data->harga = $request->harga;
        $data->size = $request->size;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
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
        $product = Product::all();
        $jenis = Jenis::all();
        $category = Category::all();
        $size = Size::all();
        return view('backend.product.edit', compact('product', 'jenis', 'category', 'size'));
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
         $this->validate($request, [

            'product' => 'string|min:4',
            'foto' => 'mimes:jpg,png,jpeg,gif|max:4000',
            'jenis' => 'numeric',
            'category' => 'numeric',
            'harga' => 'numeric',
            'size' => 'numeric',
            'deskripsi' => 'string|min:3',

        ]);

        $data = Product::find($id);
        $data->product = $request->product;
        
        if ($request->foto) {

            $foto = $request->foto;
            $extension = $foto->getClientOriginalExtension();
            $folder = 'berkas/product';
            $newName = rand(100000,1001238912).$extension;
            if (!is_dir($folder)) {
                File::makeDirectory($folder,0777,true);
            }
            $foto->move($folder, $newName);
            $data->foto = $newName;
        } 

        $data->jenis = $request->jenis;
        $data->category = $request->category;
        $data->harga = $request->harga;
        $data->size = $request->size;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Di Delete');
    }
}
