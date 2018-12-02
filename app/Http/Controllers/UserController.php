<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Jabatan;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = User::query();

        if ($request->filled('jabatan'))
        {

        $search = $request->jabatan;
        $users = $result->where('jabatan', $search);

        }

        if ($request->filled('search'))
        {

        $search = $request->search;
        $users = $result->where('name', 'LIKE', '%'.$search.'%')->orwhere('email', 'LIKE', '%'.$search.'%' );

        }

        $users = $result->orderBy('created_at', 'DESC')->paginate(3);
        $jabatan = Jabatan::all();
        return view('backend.pengguna.index', compact('users', 'jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('backend.pengguna.create', compact('jabatan'));
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

            'foto' => 'required|mimes:jpg,png,jpeg,gif',
            'name' => 'required|max:60|string',
            'email' => 'required|max:80|unique:users,email',
            'password' => 'required|min:4|confirmed',
            'jabatan' => 'required',
            'status' => 'required',

        ]);

        $data = new User;

        if ($request->foto) 
        {
            $foto = $request->foto;
            $extensiFoto = $foto->getClientOriginalExtension();
            $folderFoto = 'avatar/';
            $namaFoto = rand(100000,1001238912).'.'.$extensiFoto;

            if (!is_dir($folderFoto)) { 
                File::makeDirectory($folderFoto,0777,true); 
            }

            $foto->move($folderFoto, $namaFoto);
            $data->foto = $folderFoto.$namaFoto;
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->jabatan = $request->jabatan;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('users.index')->with('success', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $users = User::find($id);
        // $jabatan = Jabatan::all();
        // return view('', compact('users', 'jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $jabatan = Jabatan::all();
        return view('backend.pengguna.edit', compact('users', 'jabatan'));
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

            'name' => 'required|string|max:60',
            'email' => 'required|max:80',
            'jabatan' => 'required',
            'status' => 'required',

        ]);

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->jabatan = $request->jabatan;
        $data->save();

        return redirect()->route('users.index')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'Data Berhasil di Delete');
    }

    /**
     * Update the Password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:4|confirmed',

        ]);

        $data = User::find($id);
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->back()->with('success', 'Password Berhasil di ubah');
    }

    public function foto(Request $request, $id)
    {
        $this->validate($request, [

            'foto' => 'required|mimes:jpeg,jpg,png,gif',

        ]);

        $data = User::find($id);

        if ($request->foto) 
        {
            $foto = $request->foto;
            $extensiFoto = $foto->getClientOriginalExtension();
            $folderFoto = 'avatar/';
            $namaFoto = rand(100000,1001238912).'.'.$extensiFoto;

            if (!is_dir($folderFoto)) { 
                File::makeDirectory($folderFoto,0777,true); 
            }

            $foto->move($folderFoto, $namaFoto);
            $data->foto = $folderFoto.$namaFoto;
        }

        $data->save();
        return redirect()->back()->with('success', 'Foto Anda Berhasil di Ubah');

    }
}
