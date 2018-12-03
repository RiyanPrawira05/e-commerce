@extends('layouts.backend')

@section('brand') Add Stock @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ Route('stock.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                    <div class="col-4 text-right">
                        <h4 class="heading-small text-muted mb-0">Create Stock</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('stock.store') }}" method="POST">
                    {{ csrf_field() }}
                <div class="col-md-12">
                    @include('template.alert')
                </div>
                <h6 class="heading-small text-muted mb-4">Stock Information</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product</label>
                                    <select name="product" class="form-control form-control-alternative" required>
                                    <option value="" disabled selected> Pilih product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id_product }}">{{ $product->product }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Category</label>
                                    <select name="category" class="form-control form-control-alternative" required>
                                        <option value="" disabled selected> Pilih category</option>
                                    @foreach ($category as $categories)
                                        <option value="{{ $categories->id_category }}">{{ $categories->slug_category }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Stock</label>
                                    <input type="text" name="stock" class="form-control form-control-alternative" placeholder="1pcs,2pcs,5pcs" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left pt-3">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-default">Add Stock</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
