<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = Jenis::all();
        return view('layouts.admin.jenis', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.create_jenis');
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

            'bahan' => 'required|string|min:4|max:20',
            'slug_bahan' => 'required|string|min:4|max:20',
            'deskripsi' => 'min:5|max:30',

        ]);

        $data = new Jenis;
        $data->bahan = $request->bahan;
        $data->slug_bahan = $request->slug_bahan;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        return redirect()->route('jenis')->with('success', 'Data Berhasil Ditambahkan');
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
        $data = Jenis::find($id);
        return view('layouts.admin.edit_jenis', compact('data'));
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

            'bahan' => 'required|string|min:4|max:20',
            'slug_bahan' => 'required|string|min:4|max:20',
            'deskripsi' => 'min:5|max:30',

        ]);

        $data = Jenis::find($id);
        $data->bahan = $request->bahan;
        $data->slug_bahan = $request->slug_bahan;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        return redirect()->route('jenis')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jenis::find($id)->delete();
        return redirect()->route('jenis')->with('success', 'Data Berhasil Di Hapus');
    }
}
