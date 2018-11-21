@extends('layouts.backend')

@section('brand') Pengguna @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ Route('jenis.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                </div>
            </div>
            <form class="horizontal" action="{{ Route('jenis.update', $jenis->id_jenis) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Bahan</label>
                                <input type="text" name="bahan" class="form-control form-control-alternative" placeholder="Chino" value="{{ $jenis->bahan }}" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Slug</label>
                                <input type="text" name="slug_bahan" class="form-control form-control-alternative" placeholder="SlimFit" value="{{ $jenis->slug_bahan }}" autofocus>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control form-control-alternative" placeholder="Bahan yang adem slimfit tidak mudah kusut">{{ $jenis->deskripsi }}</textarea>
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