<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alamat;
use App\User;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alamat = Alamat::paginate(3);
        $users = User::all();
        return view('backend.alamat.index',compact('alamat', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('backend.alamat.create',compact('users'));
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

            'alamat' => 'required|min:10',
            'users' => 'required|numeric',

        ]);

        $alamat = new Alamat;
        $alamat->alamat = $request->alamat;
        $alamat->users = $request->users;
        $alamat->save();

        return redirect()->route('alamat.index')->with('success', 'Data Berhasil di Tambahkan');
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
        $alamat = Alamat::find($id);
        $users = User::all();
        return view('backend.alamat.edit',compact('alamat', 'users'));
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

            'alamat' => 'min:10',
            'users' => '',

        ]);

        $alamat = Alamat::find($id);
        $alamat->alamat = $request->alamat;
        $alamat->users = $request->users;
        $alamat->save();

        return redirect()->route('alamat.index')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alamat = Alamat::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil di Hapus');
    }
}
