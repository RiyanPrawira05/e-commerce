<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productwarna;
use App\Warna;
use App\Product;

class ProductwarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = Productwarna::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $productwarna = $result->where('warna', 'LIKE', '%'.$search.'%');
        }
        $productwarna = $result->orderBy('created_at', 'DESC')->paginate(3);
        $warna = Warna::all();
        $product = Product::all();
        return view('backend.productwarna.index', compact('productwarna', 'warna', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productwarna = Productwarna::all();
        $warna = Warna::all();
        $product = Product::all();
        return view('backend.productwarna.create', compact('productwarna', 'warna', 'product'));
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

            'warna' => 'required|numeric',
            'product' => 'required|numeric',

        ]);

        $productwarna = new Productwarna;
        $productwarna->warna = $request->warna;
        $productwarna->product = $request->product;
        $productwarna->save();

        return redirect()->route('Pcolors.index')->with('success', 'Data Berhasil di Tambahkan'); 
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
        $productwarna = Productwarna::find($id);
        $warna = Warna::all();
        $product = Product::all();
        return view('backend.productwarna.edit',compact('productwarna', 'warna', 'product'));
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

            'warna' => 'numeric',
            'product' => 'numeric',

        ]);

        $productwarna = Productwarna::find($id);
        $productwarna->warna = $request->warna;
        $productwarna->product = $request->product;
        $productwarna->save();

        return redirect()->route('Pcolors.index')->with('success', 'Data Berhasil di Update'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productwarna = Productwarna::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil di Delete');
    }
}
