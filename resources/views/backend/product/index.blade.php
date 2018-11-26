@extends('layouts.backend')

@section('brand') Pengguna @endsection

@section('header')
<!-- Card stats -->
<div class="row">
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
              <span class="h2 font-weight-bold mb-0">350,897</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                <i class="fas fa-chart-bar"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
              <span class="h2 font-weight-bold mb-0">2,356</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                <i class="fas fa-chart-pie"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
            <span class="text-nowrap">Since last week</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
              <span class="h2 font-weight-bold mb-0">924</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
            <span class="text-nowrap">Since yesterday</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
              <span class="h2 font-weight-bold mb-0">49,65%</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                <i class="fas fa-percent"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0 text-default">Data Produk</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ Route('product.create') }}" class="btn btn-icon-only btn-sm btn-default fas fa-plus-circle text-md text-white"></a>
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
                            <th scope="col">Foto</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Category</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Size</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($product) > 0)
                    @foreach ($product as $products)
                        <tr>
                            <td><img src="{{ asset($products->foto) }}" alt="" class="rounded-circle" width="50" height="50"></td>
                            <td><span class="font-weight-bold">{{ $products->product }}</span></td>
                            <td>{{ $products->pilihJenis->slug_bahan }}</td>
                            <td>{{ $products->pilihCategory->category }}</td>
                            <td>{{ $products->harga }}</td>
                            <td>
                              @foreach($products->pilihSize as $size)
                              {{ $size->size }},
                              @endforeach
                            </td>
                            @if (!empty($products->deskripsi))
                            <td>{{ $products->deskripsi }}</td>
                            @else
                              <td>Deskripsi Belum Di Isi</td>
                            @endif
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fas fa-ellipsis-v"></i>
                                    </a>

                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0 text-light">Actions</h6>
                                </div>

                                    <a class="btn dropdown-item" href="{{ Route('product.edit', $products->id_product) }}">
                                        <i class="fas fa-user-edit text-default"></i>
                                        <span class="text-default">Edit</span>
                                    </a>
                                    <form action="{{ Route('product.destroy', $products->id_product) }}" method="POST">
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
                {{ $product->links('pagin.pagin') }}
            </div>
        </div>
    </div>
</div>
@endsection