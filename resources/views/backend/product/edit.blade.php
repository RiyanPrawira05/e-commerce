@extends('layouts.backend')

@section('brand') Product @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ Route('product.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                </div>
            </div>
            <form class="horizontal" action="{{ Route('product.update', $product->id_product) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-12">
                    @include('template.alert')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Foto</label>
                                <img src="{{ asset($product->foto) }}">
                                <input type="file" name="foto" class="form-control form-control-alternative" placeholder="File: jpg, png, jpeg" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Produk</label>
                                <input type="text" name="product" class="form-control form-control-alternative" placeholder="Dinna Blouse" value="{{ $product->product }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Jenis</label>
                                <select name="jenis" class="form-control form-control-alternative" required>
                                @foreach ($jenis as $tipe)
                                    <option value="{{ $tipe->id_jenis }}" {{ $tipe->id_jenis == $product->jenis ? 'selected' : ''}}>{{ $tipe->slug_bahan }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Category</label>
                                <select name="category" class="form-control form-control-alternative" required>
                                @foreach ($category as $categories)
                                    <option value="{{ $categories->id_category }}" {{ $categories->id_category == $product->category ? 'selected' : ''}}>{{ $categories->category }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Size</label>
                                <select multiple="multiple" name="size" class="form-control form-control-alternative" required>
                                @foreach ($size as $ukuran)
                                    <option value="{{ $ukuran->id_size }}" {{ $ukuran->id_size == $product->size ? 'selected' : ''}}>{{ $ukuran->size }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Harga</label>
                                <input type="number" name="harga" class="form-control form-control-alternative" placeholder="IDR 4XXXXX" value="{{ $product->harga }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control form-control-alternative" placeholder="New Arrival, Hot Offer">{{ $product->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <button type="submit" class="btn btn-default">Created</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
