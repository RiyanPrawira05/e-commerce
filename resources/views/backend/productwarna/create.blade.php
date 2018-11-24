@extends('layouts.backend')

@section('brand') Product Colors @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ Route('Pcolors.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                </div>
            </div>
            <form class="horizontal" action="{{ Route('Pcolors.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-12">
                    @include('template.alert')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Warna</label>
                                <select name="warna" class="form-control form-control-alternative" required autofocus>
                                @foreach($warna as $color)
                                    <option value="{{ $color->id_warna }}">{{ $color->warna }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Product</label>
                                <select name="product" class="form-control form-control-alternative" required autofocus>
                                @foreach ($product as $products)
                                    <option value="{{ $products->id_product }}">{{ $products->product }}</option>
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