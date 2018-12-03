<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Product;
use App\Category;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = Stock::query();

        if ($request->filled('product')) 
        {
            $search = $request->product;
            $stocks = $result->where('product', $search);
        }

        if ($request->filled('category')) 
        {
            $search = $request->category;
            $stocks = $result->where('category', $search);
        }

        if ($request->filled('search')) 
        {
            $search = $request->search;
            $stocks = $result->where('stock', 'LIKE', '%'.$search.'%');
        }

        $stocks = $result->orderBy('created_at', 'DESC')->paginate(3);
        $products = Product::all();
        $category = Category::all();
        return view('backend.stock.index', compact('stocks', 'products', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $category = Category::all();
        return view('backend.stock.create', compact('products', 'category'));
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

            'stock' => 'required',
            'product' => 'required|numeric',
            'category' => 'required|numeric',

        ]);

        $stock = new Stock;
        $stock->stock = $request->stock;
        $stock->product = $request->product;
        $stock->category = $request->category;
        $stock->save();

        return redirect()->route('stock.index')->with('success', 'Data stock berhasil di tambahkan');
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
        $stocks = Stock::find($id);
        $products = Product::all();
        $category = Category::all();
        return view('backend.stock.edit', compact('stocks', 'products', 'category'));
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

            'stock' => 'required',
            'product' => 'required|numeric',
            'category' => 'required|numeric',

        ]);

        $stock = Stock::find($id);
        $stock->stock = $request->stock;
        $stock->product = $request->product;
        $stock->category = $request->category;
        $stock->save();

        return redirect()->route('stock.index')->with('success', 'Data stock sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stocks = Stock::find($id)->delete();
        return redirect()->back()->with('success', 'Data stock sudah dihapus');
    }
}
