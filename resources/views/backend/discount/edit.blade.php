@extends('layouts.backend')

@section('brand') Edit Discount @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ Route('discount.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                    <div class="col-4 text-right">
                        <h4 class="heading-small text-muted mb-0">Edit Discount</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('discount.update', $discounts->id_discount) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <div class="col-md-12">
                    @include('template.alert')
                </div>
                <h6 class="heading-small text-muted mb-4">Discount Information</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kode Discount</label>
                                    <input type="text" name="kode" class="form-control form-control-alternative" placeholder="4981XXXXX" value="{{ $discounts->kode }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Potongan</label>
                                    <input type="text" name="potongan" class="form-control form-control-alternative" placeholder="20%" value="{{ $discounts->potongan }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Pengguna</label>
                                    <select name="users" class="form-control form-control-alternative" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id_users }}" {{ $user->id_users == $discounts->users ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product</label>
                                    <select name="product" class="form-control form-control-alternative" required>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id_product }}" {{ $product->id_product == $discounts->product ? 'selected' : '' }}>{{ $product->product }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">

                    <h6 class="heading-small text-muted mb-4">Tanggal Discount</h6>
                        <div class="pl-md-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                                <input class="form-control datepicker" placeholder="Open Discount" name="open_discount" type="text" data-date-format="yyyy-mm-dd" value="{{ \Carbon\Carbon::parse($discounts->open_discount)->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                    <input class="form-control datepicker" placeholder="Expired Discount" name="expired_discount" type="text" data-date-format="yyyy-mm-dd" value="{{ \Carbon\Carbon::parse($discounts->expired_discount)->format('Y-m-d') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-left pt-4">
                                    <div class="col-md-12 mb-2">
                                        <button type="submit" class="btn btn-default">Change Discount</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
