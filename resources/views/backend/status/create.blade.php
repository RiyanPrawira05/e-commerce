@extends('layouts.backend')

@section('brand') Status @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ Route('status.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                </div>
            </div>
            <form class="horizontal" action="{{ Route('status.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-12">
                    @include('template.alert')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Status</label>
                                <div class="custom-control custom-radio">
                                    <input name="status" class="custom-control-input" id="0" type="radio" value="0">
                                    <label class="custom-control-label" for="0">Belum Di Bayar</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input name="status" class="custom-control-input" id="1" type="radio" value="1">
                                    <label class="custom-control-label" for="1">Sudah Di Bayar</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input name="status" class="custom-control-input" id="2" type="radio" value="2">
                                    <label class="custom-control-label" for="2">Proses Pengiriman</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input name="status" class="custom-control-input" id="3" type="radio" value="3">
                                    <label class="custom-control-label" for="3">Di Kirim</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input name="status" class="custom-control-input" id="4" type="radio" value="4">
                                    <label class="custom-control-label" for="4">Sudah Sampai</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Pengguna</label>
                                <select name="users" class="form-control form-control-alternative" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id_users }}">{{ $user->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-default">Created</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection