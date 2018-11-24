@extends('layouts.backend')

@section('brand') Stock @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ Route('stock.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                </div>
            </div>
            <form class="horizontal" action="{{ Route('stock.update', $stocks->id_stock) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-12">
                    @include('template.alert')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Stock</label>
                                <input type="text" name="stock" class="form-control form-control-alternative" placeholder="1pcs,2pcs,5pcs" value="{{ $stocks->stock }}" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Product</label>
                                <select name="product" class="form-control form-control-alternative" required>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id_product }}" {{ $product->id_product == $stocks->product ? 'selected' : ''}}>{{ $product->product }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Category</label>
                                <select name="category" class="form-control form-control-alternative" required>
                                @foreach ($category as $categories)
                                    <option value="{{ $categories->id_category }}" {{ $categories->id_category == $stocks->category ? 'selected' : ''}}>{{ $categories->slug_category }}</option>
                                @endforeach
                                </select>
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
