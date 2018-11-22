<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productsize;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = Productsize::all();
        return view('backend.size.index', compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.size.create');
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

            'size' => 'required',
            'deskripsi' => 'min:4',

        ]);

        $size = new Productsize;
        $size->size = $request->size;
        $size->deskripsi = $request->deskripsi;
        $size->save();

        return redirect()->route('size.index')->with('success', 'Data Berhasil Di Tambahkan');
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
        $size = Productsize::find($id);
        return view('backend.size.edit', compact('size'));
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

            'size' => 'max:300',
            'deskripsi' => 'min:4',

        ]);

        $size = Productsize::find($id);
        $size->size = $request->size;
        $size->deskripsi = $request->deskripsi;
        $size->save();

        return redirect()->route('size.index')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Productsize::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Di Hapus');
    }
}
