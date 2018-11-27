@extends('layouts.backend')

@section('brand') Stock @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="text-center">
                  <form class="horizontal" method="GET">
                      <div class="col-md-12">
                          <div class="form-group">
                              <button type="submit" class="btn btn-sm btn-primary mb-3"><span class="fas fa-search"></span></button>
                              <input class="form-control form-control-alternative" type="text" name="search" placeholder="Type here for Search" value="{{ request()->search }}" autofocus>
                          </div>
                      </div>
                  </form>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0 text-default">Data Stock</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ Route('stock.create') }}" class="btn btn-icon-only btn-sm btn-default fas fa-plus-circle text-md text-white"></a>
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
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($stocks) > 0)
                    @foreach ($stocks as $stock)
                        <tr>
                            <td>
                              <span class="badge badge-dot mr-4"><i class="bg-default"></i> <span class="mb-0 text-sm"><b>{!! $stock->stock !!}</b></span>
                            </td>
                            <th scope="row">
                              <div class="media align-items-center">
                                 <div class="media-body">
                                    <span class="mb-0 text-sm">{{ $stock->pilihProduct->product }}</span>
                                 </div>
                              </div>
                            </th>
                            <th scope="row">
                              <div class="media align-items-center">
                                 <div class="media-body">
                                    <span class="mb-0 text-sm">{{ $stock->pilihCategory->category }}</span>
                                 </div>
                              </div>
                            </th>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fas fa-ellipsis-v"></i>
                                    </a>

                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0 text-light">Actions</h6>
                                </div>

                                    <a class="btn dropdown-item" href="{{ Route('stock.edit', $stock->id_stock) }}">
                                        <i class="fas fa-user-edit text-default"></i>
                                        <span class="text-default">Edit</span>
                                    </a>
                                    <form action="{{ Route('stock.destroy', $stock->id_stock) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                      <button class="btn dropdown-item" type="submit">
                                          <i class="fas fa-user-times text-default"></i>
                                          <span class="text-default">Delete</span>
                                      </button>
                                    </form>
                                </div>
                                </div>
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