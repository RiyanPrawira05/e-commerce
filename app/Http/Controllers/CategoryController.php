<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = Category::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $category = $result->where('category', 'LIKE', '%'.$search.'%');
        }
        $category = $result->orderBy('category', 'DESC')->paginate(3);
        return view('backend.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            
            'category'=> 'required|min:3|string|unique:category,category',
            'deskripsi'=> 'required|min:3|string',

        ]);

        $category = new Category;
        $category->category = $request->category;
        $category->deskripsi = $request->deskripsi;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Data Berhasil Di Tambah');
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
        $data = Category::find($id);
        return view('backend.category.edit', compact('data'));
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
            
            'category'=> 'min:3|string',
            'deskripsi'=> 'min:3|string',

        ]);

        $category = Category::find($id);
        $category->category = $request->category;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Di Hapus');
    }
}
