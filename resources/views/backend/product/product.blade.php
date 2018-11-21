@extends('home_backend')

@section('content')

<div class="table-responsive">
    <table class="table align-items-center">
        <thead class="thead-light">
            @include('template.alert')
            <th class="mb-0 text-sm">Data Product : {!! $product->count() !!}</th>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Product</th>
                <th scope="col">Jenis</th>
                <th scope="col">Category</th>
                <th scope="col">Harga</th>
                <th scope="col">Size</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">
                    <a href="{{ route('create') }}"><i class="fas fa-plus-circle text-sm text-success"></i></a>
                </th>
            </tr>
        </thead>
        <tbody>
        @if (count($product) > 0)
        @foreach ($product as $products)
            <tr>
                <td>
                    {{ $products->foto }}
                </td>
                <th scope="row">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <span class="mb-0 text-sm">{{ $products->product }}</span>
                        </div>
                    </div>
                </th>
                <td>
                    {{ $products->jenis }}
                </td>
                <td>
                    {{ $products->category }}
                </td>
                <th>
                    <span class="mb-0 text-md text-green"> {!! $products->harga !!} </span>
                </th>
                <th scope="row">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <span class="mb-0 text-sm">{{ $products->size }}</span>
                        </div>
                    </div>
                </th>
                <td>
                    {{ $products->deskripsi }}
                </td>
                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href=""><i class="fas fa-user-edit text-yellow"></i>Edit</a>
                            <a class="dropdown-item" href=""><i class="fas fa-user-times text-danger"></i>Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        @else
            <td align="center">Data Tidak Ditemukan !!</td>
        @endif
    </tbody>
</table>
</div>

@endsection