<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankAccount;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accountBank = BankAccount::query();

        if ($request->filled('search')){
            $accountBank = $accountBank->where('ats_nama', 'LIKE', '%'.$request->search.'%')->orWhere('no_rek', 'LIKE', '%'.$request->search.'%');
        }
        $accountBank = $accountBank->orderBy('name_bank', 'DESC')->paginate(3);
        return view('backend.bankAccount.index', compact('accountBank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bankAccount.create');
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
            'name_bank' => 'required|max:4',
            'no_rek' => 'required|numeric',
            'ats_nama' => 'required|string|min:4|max:80',
        ]);

        $accountBank = new BankAccount;
        $accountBank->name_bank = $request->name_bank;
        $accountBank->no_rek = $request->no_rek;
        $accountBank->ats_nama = $request->ats_nama;
        $accountBank->save();
        return redirect()->route('bank.index')->with('success', 'Data BankAccount Berhasil di Tambahkan');
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
        $accountBank = BankAccount::find($id);
        return view('backend.bankAccount.edit', compact('accountBank'));
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
            'name_bank' => 'required|max:4',
            'no_rek' => 'required|numeric',
            'ats_nama' => 'required|string|min:4|max:80',
        ]);

        $accountBank = BankAccount::find($id);
        $accountBank->name_bank = $request->name_bank;
        $accountBank->no_rek = $request->no_rek;
        $accountBank->ats_nama = $request->ats_nama;
        $accountBank->save();
        return redirect()->route('bank.index')->with('success', 'Data BankAccount Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accountBank = BankAccount::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil di Delete');
    }
}
