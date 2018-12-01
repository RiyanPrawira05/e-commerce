@extends('layouts.backend')

@section('brand') Edit Pengguna @endsection

@section('content')
<div class="row">
    <div class="col-md-7">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ Route('users.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @include('template.alert')
            </div>
            <div class="col-md-12">
                Change Data
                <hr class="my-3">
            </div>
            <form class="horizontal" action="{{ Route('users.update', $users->id_users) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Nama</label>
                                <input type="text" name="name" class="form-control form-control-alternative" placeholder="Ryan Pratama" value="{{ $users->name }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="email" name="email" class="form-control form-control-alternative" placeholder="pratama@gmail.com" value="{{ $users->email }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Jabatan</label>
                                <select class="form-control form-control-alternative" name="jabatan" required>
                                  <option value="" selected disabled>-- Pilih Jabatan --</option>
                                  @foreach ($jabatan as $posisi => $value)
                                    <option value="{{ $value->id_jabatan }}" {{ $users->jabatan == $value->id_jabatan ? 'selected' : '' }}>{{ $value->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <button type="submit" class="btn btn-primary">Change Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        Change Password
                        <hr class="my-3">
                    </div>
                </div>
            </div>
            <form class="horizontal" action="{{ Route('users.password', $users->id_users) }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">New Password</label>
                                <input type="password" name="password" class="form-control form-control-alternative" placeholder="Masukan Password Baru">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-alternative" placeholder="Masukan Ulang Password">
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
