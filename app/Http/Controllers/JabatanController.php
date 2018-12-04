<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jabatan = Jabatan::query();
        if ($request->filled('search')) 
        {
            $jabatan = $jabatan->where('name', 'LIKE', '%'.$request->search.'%')->orWhere('slug_jabatan', 'LIKE', '%'.$request->search.'%');
        }
        $jabatan = $jabatan->orderBy('name', 'DESC')->paginate(3);
        return view('backend.jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.jabatan.create');
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
            'name' => 'required|string|min:4|max:30|unique:jabatan,name',
            'slug_jabatan' => 'required|string|min:4|max:30|unique:jabatan,slug_jabatan',
        ]);

        $jabatan = new Jabatan;
        $jabatan->name = $request->name;
        $jabatan->slug_jabatan = $request->slug_jabatan;
        $jabatan->save();
        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil ditambahkan');
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
        $jabatan = Jabatan::find($id);
        return view('backend.jabatan.edit', compact('jabatan'));
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
            'name' => 'required|string|min:4|max:30',
            'slug_jabatan' => 'required|string|min:4|max:30',
        ]);

        $jabatan = Jabatan::find($id);
        $jabatan->name = $request->name;
        $jabatan->slug_jabatan = $request->slug_jabatan;
        $jabatan->save();
        return redirect()->route('jabatan.index')->with('success', 'Data jabatan sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id)->delete();
        return redirect()->back()->with('success', 'Data jabatan sudah dihapus');
    }
}
