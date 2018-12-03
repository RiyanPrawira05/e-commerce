@extends('layouts.backend')

@section('brand') Stock @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="text-center">
                    <form class="form-inline" style="margin-bottom: 30px;">
                        <div class="col-xs-12 mr-3">
                            <div class="form-group">
                                <select class="form-control form-control-alternative mb-3" name="product">
                                    <option value="" selected disabled>-- Berdasarkan Products --</option>
                                    @foreach($products as $key => $product)
                                        <option value="{{ $product->id_product }}" {{ Request::get('product') == $product->id_product ? 'selected' : '' }}>{{ $product->product }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 mr-3">
                            <div class="form-group">
                                <select class="form-control form-control-alternative mb-3" name="category">
                                    <option value="" selected disabled>-- Berdasarkan Category --</option>
                                    @foreach($category as $key => $categories)
                                        <option value="{{ $categories->id_category }}" {{ Request::get('category') == $categories->id_category ? 'selected' : '' }}>{{ $categories->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 mr-3">
                            <div class="form-group">
                                <input class="form-control form-control-alternative" type="text" name="search" placeholder="Search" value="{{ Request::get('search') }}" autocomplete="off" size="60">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-sm btn-primary"><span class="fas fa-search"></span>&nbsp; SEARCH</button>
                        </div>
                    </form>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="heading-small text-muted mb-0">Data Stock</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ Route('stock.create') }}" class="btn btn-sm btn-default"><span class="fas fa-plus-circle text-md text-white"></span>&nbsp; ADD</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @include('template.alert')
            </div>
            <div class="table-responsive">
                <table class="table align-items-center">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Stock</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Category</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($stocks) > 0)
                    @foreach ($stocks as $stock)
                        <tr>
                            <td>
                                <span class="badge badge-dot mr-4"><i class="bg-default"></i> <span class="mb-0 text-sm"><b>{!! $stock->stock !!}</b></span>
                            </td>
                            <th>
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">{{ $stock->pilihProduct->product }}</span>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">{{ $stock->pilihCategory->category }}</span>
                                    </div>
                                </div>
                            </th>
                            <td class="text-right">
                                <a class="btn btn-sm btn-warning" href="{{ Route('stock.edit', $stock->id_stock) }}"><span class="fas fa-pencil-ruler"></span>&nbsp;EDIT</a>
                            </td>
                            <td class="text-right">
                                <form action="{{ Route('stock.destroy', $stock->id_stock) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger" type="submit"><span class="fas fa-eraser"></span>&nbsp;DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <td align="center" class="mb-0 text-danger">Data Tidak Ditemukan !!</td>
                    @endif
                    </tbody>
                </table>
                {{ $stocks->links('pagin.pagin') }}
            </div>
        </div>
    </div>
</div>
@endsection