@extends('layouts.backend')

@section('brand') Edit Size @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ Route('size.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                    <div class="col-4 text-right">
                        <h4 class="heading-small text-muted mb-0">Edit Size</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('size.update', $size->id_size) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <div class="col-md-12">
                    @include('template.alert')
                </div>
                <h6 class="heading-small text-muted mb-4">Size Information</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-control-label">Size</label>
                                    <input type="text" name="size" class="form-control form-control-alternative" placeholder="s,m,l,xl,cm" value="{{ $size->size }}" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-control-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control form-control-alternative" placeholder="Ukuran all untuk semua ukuran" required>{{ $size->deskripsi }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left pt-3">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-default">Change Size</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection