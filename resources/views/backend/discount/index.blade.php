@extends('layouts.backend')

@section('brand') Discount @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="text-center">
                    <form class="form-inline" style="margin-bottom: 30px;">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xs-12 mr-3">
                                    <div class="form-group">
                                        <select class="form-control form-control-alternative mb-3" name="product">
                                            <option value="" selected disabled>-- Berdasarkan Product --</option>
                                            @foreach($products as $key => $product)
                                                <option value="{{ $product->id_product }}" {{ Request::get('product') == $product->id_product ? 'selected' : '' }}>{{ $product->product }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 mr-3">
                                    <div class="form-group">
                                        <select class="form-control form-control-alternative mb-3" name="users">
                                            <option value="" selected disabled>-- Berdasarkan Users --</option>
                                            @foreach($users as $keys => $user)
                                                <option value="{{ $user->id_users }}" {{ Request::get('users') == $user->id_users ? 'selected' : '' }}>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 mr-3">
                                    <div class="form-group">
                                        <input type="text" autocomplete="off" class="form-control form-control-alternative" placeholder="Search" name="search" value="{{ Request::get('search') }}" size="60">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-sm btn-primary"><span class="fas fa-search"></span>&nbsp; SEARCH</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="heading-small text-muted mb-0">Data Discount</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ Route('discount.create') }}" class="btn btn-sm btn-default"><span class="fas fa-plus-circle"></span>&nbsp; ADD</a>
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
                            <th scope="col">Kode Discount</th>
                            <th scope="col">Potongan</th>
                            <th scope="col">Product</th>
                            <th scope="col">Users</th>
                            <th scope="col">Open Discount</th>
                            <th scope="col">Expired Discount</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($discounts) > 0)
                    @foreach ($discounts as $discount)
                        <tr>
                            <td><span class="font-weight-bold">{{ $discount->kode }}</span></td>
                            <td><span class="font-weight-bold">{{ $discount->potongan }}</span></td>
                            <td>{{ $discount->pilihProduct->product }}</td>
                            <td>{{ $discount->pilihPengguna->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($discount->open_discount)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($discount->expired_discount)->diffForHumans($discount->open_discount) }}</td>
                            
                            <td class="text-right">
                                <a class="btn btn-sm btn-warning" href="{{ Route('discount.edit', $discount->id_discount) }}"><span class="fas fa-pencil-ruler"></span>&nbsp;EDIT</a>
                            </td>
                            <td class="text-right">
                                <form action="{{ Route('discount.destroy', $discount->id_discount) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger" type="submit"><span class="fas fa-eraser"></span>&nbsp;DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <th class="mb-0 text-danger">Data Discount Kosong !!</th>
                    @endif
                    </tbody>
                </table>
                {{ $discounts->links('pagin.pagin') }}
            </div>
        </div>
    </div>
</div>
@endsection

