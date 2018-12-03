@extends('layouts.backend')

@section('brand') Edit Status @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ Route('status.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                    <div class="col-4 text-right">
                        <h4 class="heading-small text-muted mb-0">Edit Status</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('status.update', $status->id_status) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <div class="col-md-12">
                    @include('template.alert')
                </div>
                <h6 class="heading-small text-muted mb-4">Status</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input name="status" class="custom-control-input" id="0" type="radio" value="0" {{ $status->status == 0 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="0">Belum Di Bayar</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input name="status" class="custom-control-input" id="1" type="radio" value="1" {{ $status->status == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="1">Sudah Di Bayar</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input name="status" class="custom-control-input" id="2" type="radio" value="2" {{ $status->status == 2 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="2">Proses Pengiriman</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input name="status" class="custom-control-input" id="3" type="radio" value="3" {{ $status->status == 3 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="3">Di Kirim</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input name="status" class="custom-control-input" id="4" type="radio" value="4" {{ $status->status == 4 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="4">Sudah Sampai</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Pengguna</label>
                                    <select name="users" class="form-control form-control-alternative" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id_users }}" {{ $user->id_users == $status->users ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left pt-4">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-default">Updated</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection