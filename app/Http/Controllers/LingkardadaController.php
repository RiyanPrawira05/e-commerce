<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lingkardada;
use App\Product;

class LingkardadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lingkardada = Lingkardada::paginate(3);
        $products = Product::all();
        return view('backend.lingkardada.index', compact('lingkardada', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('backend.lingkardada.create', compact('lingkardada', 'products'));
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

            'ukuran' => 'required',
            'product' => 'required|numeric',

        ]);

        $lingkardada = new Lingkardada;
        $lingkardada->ukuran = $request->ukuran;
        $lingkardada->product = $request->product;
        $lingkardada->save();

        return redirect()->route('LD.index')->with('success', 'Data Berhasil di Tambahkan');
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
        $lingkardada = Lingkardada::find($id);
        $products = Product::all();
        return view('backend.lingkardada.edit', compact('lingkardada', 'products'));
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

            'ukuran' => 'required',
            'product' => 'required|numeric',

        ]);

        $lingkardada = Lingkardada::find($id);
        $lingkardada->ukuran = $request->ukuran;
        $lingkardada->product = $request->product;
        $lingkardada->save();

        return redirect()->route('LD.index')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lingkardada = Lingkardada::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil di Hapus');
    }
}
