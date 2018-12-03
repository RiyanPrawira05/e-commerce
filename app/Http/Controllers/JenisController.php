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
    public function index(Request $request)
    {
        $result = Jenis::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $jenis = $result->where('bahan', 'LIKE', '%'.$search.'%');
        }
        $jenis = $result->orderBy('created_at', 'DESC')->paginate(3);
        return view('backend.jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.jenis.create');
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

            'bahan' => 'required|min:4|max:50|string|unique:jenis,bahan',
            'slug_bahan' => 'required|string|min:4|max:50',
            'deskripsi' => 'min:5|string|nullable',

        ]);

        $data = new Jenis;
        $data->bahan = $request->bahan;
        $data->slug_bahan = $request->slug_bahan;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        return redirect()->route('jenis.index')->with('success', 'Data jenis berhasil ditambahkan');
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
        $jenis = Jenis::find($id);
        return view('backend.jenis.edit', compact('jenis'));
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

            'bahan' => 'string|min:4|max:50',
            'slug_bahan' => 'string|min:4|max:50',
            'deskripsi' => 'min:5',

        ]);

        $data = Jenis::find($id);
        $data->bahan = $request->bahan;
        $data->slug_bahan = $request->slug_bahan;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        return redirect()->route('jenis.index')->with('success', 'Data jenis telah di ubah');
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
        return redirect()->back()->with('success', 'Data jenis sudah dihapus');
    }
}
