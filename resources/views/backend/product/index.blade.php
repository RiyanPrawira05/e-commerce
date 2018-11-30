@extends('layouts.backend')

@section('brand') Pengguna @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="text-center">
                    <form class="form-inline" style="margin-bottom: 40px;">
                        <div class="col-md-5">
                            <div class="form-group">
                                <select class="form-control form-control-alternative" name="category">
                                    <option value="" selected disabled>-- Berdasarkan Kategori --</option>
                                    @foreach($category as $key => $categories)
                                        <option value="{{ $categories->id_category }}" {{ Request::get('category') == $categories->id_category ? 'selected' : '' }}>{{ $categories->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <select class="form-control form-control-alternative" name="jenis">
                                    <option value="" selected disabled>-- Berdasarkan Jenis --</option>
                                    @foreach($jenis as $keys => $tipe)
                                        <option value="{{ $tipe->id_jenis }}" {{ Request::get('jenis') == $tipe->id_jenis ? 'selected' : '' }}>{{ $tipe->bahan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <form class="harizontal">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" autocomplete="off" class="form-control form-control-alternative" placeholder="Search" name="search" value="{{ Request::get('search') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-sm btn-primary"><span class="fas fa-search"></span>&nbsp; Search</button>
                        </div>
                    </form>
                </div>
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
                            <td><img src="{{ asset($products->foto) }}" alt="" class="rounded-circle" width="70" height="70"></td>
                            <td><span class="font-weight-bold"><strong>{{ $products->product }}</strong></span></td>
                            <td><span class="font-weight-bold">{{ $products->pilihJenis->slug_bahan }}</span></td>
                            <td><span class="font-weight-bold">{{ $products->pilihCategory->category }}</span></td>
                            <td><span class="font-weight-bold">{{ $products->harga }}</span></td>
                            <td>
                            @foreach($products->pilihSize as $size)
                              <!-- Memanggil fungsi dimobel dan lakukan Perulangan untuk select multiple size karena name html nya berbentuk array[] -->
                                @if ($size->size == 'S')
                                  <span class="badge badge-dot mr-3"><i class="bg-danger"></i><span class="mb-0 text-sm"></span><b> {{ $size->size }}</b></span>
                                @elseif ($size->size == 'M')
                                  <span class="badge badge-dot mr-3"><i class="bg-warning"></i><span class="mb-0 text-sm"></span><b> {{ $size->size }}</b></span>
                                @elseif ($size->size == 'M')
                                  <span class="badge badge-dot mr-3"><i class="bg-info"></i><span class="mb-0 text-sm"></span><b> {{ $size->size }}</b></span>
                                @elseif ($size->size == 'XL')
                                  <span class="badge badge-dot mr-3"><i class="bg-success"></i><span class="mb-0 text-sm"></span><b> {{ $size->size }}</b></span>
                                @endif

                            @endforeach
                            </td>
                            @if (!empty($products->deskripsi))
                            <td><span class="font-weight-bold">{{ $products->deskripsi }}</span></td>
                            @else
                              <th class="text-danger">Deskripsi Belum Di Isi</th>
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
                        <th class="mb-0 text-danger">Data Tidak Ditemukan !!</th>
                    @endif
                    </tbody>
                </table>
                {{ $product->links('pagin.pagin') }}
            </div>
        </div>
    </div>
</div>

@endsection