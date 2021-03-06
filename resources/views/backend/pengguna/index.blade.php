@extends('layouts.backend')

@section('brand') Users @endsection

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
                                        <select class="form-control form-control-alternative" name="jabatan">
                                            <option value="" selected disabled>-- Berdasarkan Hak Akses --</option>
                                            @foreach ($jabatan as $keys => $posisi)
                                                <option value="{{ $posisi->id_jabatan }}" {{ Request::get('jabatan') == $posisi->id_jabatan ? 'selected' : '' }}>{{ $posisi->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 mr-3">
                                    <div class="form-group">
                                        <input type="text" autocomplete="off" class="form-control form-control-alternative" placeholder="Search" name="search" value="{{ Request::get('search') }}" size="35">
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
                        <h3 class="heading-small text-muted mb-0">Data Users</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ Route('users.create') }}" class="btn btn-sm btn-default"><span class="fas fa-plus-circle"></span>&nbsp; ADD</a>
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
                            <th scope="col">Photo Users</th>
                            <th scope="col">Status</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email Addres</th>
                            <th scope="col">Hak Akses</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($users) > 0)
                    @foreach ($users as $user)
                        <tr>
                            <td><img src="{{ asset($user->foto) }}" alt="" class="rounded-circle" width="70" height="70"></td>
                            <th>{{ $user->status }}</th>
                            @if ($user->name == Auth::user()->name)
                            <td><span class="badge badge-dot mr-4"><i class="bg-success"></i><b>{{ $user->name }}</b></td>
                            @else
                            <td><span class="badge badge-dot mr-4"><i class="bg-danger"></i><b>{{ $user->name }}</b></span><p class="text-sm">(sedang tidak online)</p></td>
                            @endif
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->opsiJabatan->name }}</th>
                            <td class="text-right">
                                <a class="btn btn-sm btn-warning" href="{{ Route('users.edit', $user->id_users) }}"><span class="fas fa-pencil-ruler"></span>&nbsp;EDIT</a>
                            </td>
                            <td class="text-right">
                                <form action="{{ Route('users.destroy', $user->id_users) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger" type="submit"><span class="fas fa-eraser"></span>&nbsp;DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <th class="mb-0 text-danger">Data Users Kosong !!</th>
                    @endif
                    </tbody>
                </table>
                {{ $users->links('pagin.pagin') }}
            </div>
        </div>
    </div>
</div>
@endsection