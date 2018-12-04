<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Jenis;
use App\Category;
use App\Size as Productsize;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $product = Product::whereHas('pilihCategory', function($query) use ($request) {

        //     $query->where('category', $request->search)->orWhere('harga', 'LIKE', '%'.$request->search.'%');
        // });

        $product = Product::query();

        if ($request->filled('category')) 
        {
            $product = $product->where('category', $request->category);
        }

        if ($request->filled('jenis')) 
        {
            $product = $product->where('jenis', $request->jenis);
        }
        
        if ($request->filled('search')) 
        {
            $product = $product->where('product', 'LIKE', '%'.$request->search.'%');
        }

        $product = $product->orderBy('created_at', 'DESC')->paginate(3);

        $jenis = Jenis::all();
        $category = Category::all();
        $size = Productsize::all();
        return view('backend.product.index', compact('product', 'jenis', 'category', 'size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $jenis = Jenis::all();
        $category = Category::all();
        $size = Productsize::all();
        return view('backend.product.create', compact('product', 'jenis', 'category', 'size'));
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

            'product' => 'required|string|min:4',
            'foto' => 'required|mimes:jpg,png,jpeg,gif|max:20000',
            'jenis' => 'required',
            'category' => 'required',
            'harga' => 'required|numeric',
            'size' => 'required',
            'deskripsi' => 'string|min:3|nullable',

        ]);

        $data = new Product;
        $data->product = $request->product;
        
        if ($request->foto) { // jika ada inputan foto

            $foto = $request->foto; // deklarasi foto = inputan file foto
            $extension = $foto->getClientOriginalExtension(); // extensi foto
            $folder = 'produk/'; // nama folder
            $newName = rand(100000,1001238912).'.'.$extension; // nama file = random.extensi(jpg or png), rand = 100000 sampai 1001238912
            if (!is_dir($folder)) { // jika tidak ada folder
                File::makeDirectory($folder,0777,true); // buat folder
            }
            $foto->move($folder, $newName); // si foto pindah/masuk ke folder yang sudan dibikin dan dinamakan file nya = file.extensi (rand.extensi (jpg or png))
            $data->foto = $folder.$newName; // menyimpan $request->foto ke database dan berbentuk rand.extensi (jpg or png) nama filenya
        } 

        $data->jenis = $request->jenis;
        $data->category = $request->category;
        $data->harga = $request->harga;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        if ($request->size) {
            foreach ($request->size as $size) {
                $data->pilihSize()->attach($size); // Memanggil fungsi dimobel dan lakukan Perulangan pakai attach untuk select multiple size karena name html nya berbentuk array[]
            }
        }

        return redirect()->route('product.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $product = Product::find($id);
        $jenis = Jenis::all();
        $category = Category::all();
        $size = Productsize::all();
        foreach ($product->pilihSize as $key => $value) {
            foreach ($size as $size_key => $size_value) {
                if ($value['id'] == $size_value['id']) {
                    $size[$size_key]['checked'] = true;
                }
            }
        }
        return view('backend.product.edit', compact('product', 'jenis', 'category', 'size'));
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

            'product' => 'string|min:4',
            'foto' => 'mimes:jpg,png,jpeg,gif|max:8000',
            'jenis' => 'numeric',
            'category' => 'numeric',
            'harga' => 'numeric',
            'size' => 'required',
            'deskripsi' => 'string|nullable',

        ]);

        $data = Product::find($id);
        $data->product = $request->product;
        
        if ($request->foto) {

            $foto = $request->foto;
            $extension = $foto->getClientOriginalExtension();
            $folder = 'berkas/product/';
            $newName = rand(100000,1001238912).$extension;
            if (!is_dir($folder)) {
                File::makeDirectory($folder,0777,true);
            }
            $foto->move($folder, $newName);
            $data->foto = $folder.$newName;
        } 

        $data->jenis = $request->jenis;
        $data->category = $request->category;
        $data->harga = $request->harga;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        $data->pilihSize()->detach();

        if ($request->size) {
            foreach ($request->size as $key => $value) {
                $data->pilihSize()->attach($value);
            }
        }

        return redirect()->route('product.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Di Delete');
    }
}
