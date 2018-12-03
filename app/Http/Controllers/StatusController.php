<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\User;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = Status::query();

        if ($request->filled('users')) 
        {
            $search = $request->users;
            $status = $result->where('users', $search);
        }

        if ($request->filled('search')) 
        {
            $search = $request->search;
            $status = $result->where('status', 'LIKE', '%'.$search.'%');
        }
        $status = $result->orderBy('created_at', 'DESC')->paginate(3);
        $users = User::all();
        return view('backend.status.index', compact('status', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('backend.status.create', compact('users'));
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

            'status' => 'required|string',
            'users' => 'required|numeric',

        ]);

        $status = new Status;
        $status->status = $request->status;
        $status->users = $request->users;
        $status->save();
        return redirect()->route('status.index')->with('success', 'Data status berhasil ditambahkan');
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
        $status = Status::find($id);
        $users = User::all();
        return view('backend.status.edit', compact('status', 'users'));
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

            'status' => 'string',
            'users' => 'numeric',

        ]);

        $status = Status::find($id);
        $status->status = $request->status;
        $status->users = $request->users;
        $status->save();
        return redirect()->route('status.index')->with('success', 'Data status sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Status::find($id)->delete();
        return redirect()->back()->with('success', 'Data status sudah dihapus');
    }
}
