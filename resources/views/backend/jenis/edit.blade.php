@extends('layouts.backend')

@section('brand') Edit Jenis @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ Route('jenis.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                    <div class="col-4 text-right">
                        <h4 class="heading-small text-muted mb-0">Edit Jenis</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('jenis.update', $jenis->id_jenis) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <div class="col-md-12">
                    @include('template.alert')
                </div>
                    <h6 class="heading-small text-muted mb-4">Jenis Information</h6>
                        <div class="pl-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Bahan</label>
                                        <input type="text" name="bahan" class="form-control form-control-alternative" placeholder="Chino" value="{{ $jenis->bahan }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Slug</label>
                                        <input type="text" name="slug_bahan" class="form-control form-control-alternative" placeholder="SlimFit" value="{{ $jenis->slug_bahan }}" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control form-control-alternative" placeholder="Bahan yang adem slimfit tidak mudah kusut">{{ $jenis->deskripsi }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-left pt-4">
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-default">Change Jenis</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection