<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lingkardada;

class LingkardadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = Lingkardada::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $lingkardada = $result->where('ukuran', 'LIKE', '%'.$search.'%');
        }
        $lingkardada = $result->orderBy('ukuran', 'DESC')->paginate(3);
        return view('backend.lingkardada.index', compact('lingkardada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lingkardada.create');
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

        ]);

        $lingkardada = new Lingkardada;
        $lingkardada->ukuran = $request->ukuran;
        $lingkardada->save();

        return redirect()->route('LD.index')->with('success', 'Data lingkar dada berhasil ditambahkan');
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
        return view('backend.lingkardada.edit', compact('lingkardada'));
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

        ]);

        $lingkardada = Lingkardada::find($id);
        $lingkardada->ukuran = $request->ukuran;
        $lingkardada->save();

        return redirect()->route('LD.index')->with('success', 'Data lingkar dada sudah diubah');
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
        return redirect()->back()->with('success', 'Data lingkar dada sudah dihapus');
    }
}
