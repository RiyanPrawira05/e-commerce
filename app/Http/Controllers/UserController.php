<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

        if ($request->filled('search'))
        {

        $search = $request->search;
        $users = $result->where('name', 'LIKE', '%'.$search.'%')->orwhere('email', 'LIKE', '%' .$request->search. '%' );

        }

        $users = $result->orderBy('created_at', 'DESC')->paginate(3);
        return view('backend.pengguna.index', compact('users', 'pesan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pengguna.create');
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

            'name' => 'required|max:60|string',
            'email' => 'required|max:80|unique:users,email',
            'password' => 'min:4',
            'jabatan' => 'required',

        ]);

        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->jabatan = $request->jabatan;
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
        $users = User::find($id);
        return view('backend.pengguna.edit', compact('users'));
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

            'name' => 'required|max:60|string',
            'email' => 'required|max:80',
            'password' => 'min:4',
            'jabatan' => 'required',

        ]);

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($data->password){
            $data->password = bcrypt($request->password);
        }

        $data->jabatan = $request->jabatan;
        $data->save();

        return redirect()->back()->with('success', 'Data Berhasil di Update');
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
}
