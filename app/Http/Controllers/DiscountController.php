<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use App\User;
use App\Product;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = Discount::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $discounts = $result->where('potongan', 'LIKE', '%'.$search.'%');
        }
        $discounts = $result->orderBy('created_at', 'DESC')->paginate(3);
        $users = User::all();
        $products = Product::all();
        return view('backend.discount.index', compact('discounts', 'users', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('backend.discount.create', compact('users', 'products'));
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

            'kode' => 'required|numeric|min:5',
            'potongan' => 'required',
            'users' => 'required',
            'product' => 'required',
            'open_discount' => 'required',
            'expired_discount' => 'required', //after tomorrow?

        ]);

        $discounts = new Discount;
        $discounts->kode = $request->kode;
        $discounts->potongan = $request->potongan;
        $discounts->users = $request->users;
        $discounts->product = $request->product;
        $discounts->open_discount = $request->open_discount.' 00:00:00';
        $discounts->expired_discount = $request->expired_discount.' 00:00:00';
        $discounts->save();

        return redirect()->route('discount.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $discounts = Discount::find($id);
        $users = User::all();
        $products = Product::all();
        return view('backend.discount.edit', compact('discounts', 'users', 'products'));
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

            'kode' => 'required|numeric|min:5',
            'potongan' => 'required',
            'users' => 'required',
            'product' => 'required',
            'open_discount' => 'required',
            'expired_discount' => 'required', //after tomorrow?

        ]);

        $discounts = Discount::find($id);
        $discounts->kode = $request->kode;
        $discounts->potongan = $request->potongan;
        $discounts->users = $request->users;
        $discounts->product = $request->product;
        $discounts->open_discount = $request->open_discount.' 00:00:00';
        $discounts->expired_discount = $request->expired_discount.' 00:00:00';
        $discounts->save();

        return redirect()->route('discount.index')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discounts = Discount::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil di Hapus');
    }
}
