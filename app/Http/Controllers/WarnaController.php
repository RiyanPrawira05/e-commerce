<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warna;

class WarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = Warna::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $colors = $result->where('warna', 'LIKE', '%'.$search.'%');
        }
        $colors = $result->orderBy('warna', 'DESC')->paginate(3);
        return view('backend.warna.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.warna.create');
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

            'warna' => 'required|string|min:3|max:35|unique:warna,warna',

        ]);

        $colors = new Warna;
        $colors->warna = $request->warna;
        $colors->save();
        return redirect()->route('colors.index')->with('success', 'Data colors berhasil di tambahkan');
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
        $colors = Warna::find($id);
        return view('backend.warna.edit', compact('colors'));
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

            'warna' => 'string|min:3|max:35|unique:warna,warna',

        ]);

        $colors = Warna::find($id);
        $colors->warna = $request->warna;
        $colors->save();
        return redirect()->route('colors.index')->with('success', 'Data Colors sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colors = Warna::find($id)->delete();
        return redirect()->back()->with('success', 'Data Colors sudah dihapus');
    }
}
