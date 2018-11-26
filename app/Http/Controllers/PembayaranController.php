<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Via;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::whereHas('pilihPembayaran', function($query){
            $query->where('via')->paginate(3);
        });
        $via = Via::all();
        return view('backend.pembayaran.index', compact('pembayaran', 'via'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $via = Via::all();
        return view('backend.pembayaran.create', compact('via'));
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

            'via' => 'required',

        ]);

        $pembayaran = new Pembayaran;
        $pembayaran->via = $request->via;
        $pembayaran->save();
        return redirect()->route('pembayaran.index')->with('success', 'Data Berhasil Di Tambahkan');
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
        $pembayaran = Pembayaran::find($id);
        $via = Via::all();
        return view('backend.pembayaran.edit', compact('pembayaran', 'via'));
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

            'via' => 'string',

        ]);

        $pembayaran = Pembayaran::find($id);
        $pembayaran->via = $request->via;
        $pembayaran->save();
        return redirect()->route('pembayaran.index')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil di Delete');
    }
}
