@extends('layouts.backend')

@section('brand') Status @endsection

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
                                        <select class="form-control form-control-alternative mb-3" name="users">
                                            <option value="" selected disabled>-- Berdasarkan Users --</option>
                                            @foreach($users as $key => $user)
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
                        <h3 class="heading-small text-muted mb-0">Data Status</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ Route('status.create') }}" class="btn btn-sm btn-default"><span class="fas fa-plus-circle"></span>&nbsp; ADD</a>
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
                            <th scope="col">Status</th>
                            <th scope="col">Users</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($status) > 0)
                    @foreach ($status as $stat)
                        <tr>
                            <td>
                            @if ($stat->status == 0)
                              <span class="badge badge-dot mr-4"><i class="bg-danger"></i> <span class="mb-0 text-sm"><b>{{ $stat->status == 0 ? 'Belum Bayar' : '' }}</b></span>
                            @elseif ($stat->status == 1)
                              <span class="badge badge-dot mr-4"><i class="bg-warning"></i> <span class="mb-0 text-sm"><b>{{ $stat->status == 1 ? 'Sudah Bayar' : '' }}</b></span>
                            @elseif ($stat->status == 2)
                              <span class="badge badge-dot mr-4"><i class="bg-default"></i> <span class="mb-0 text-sm"><b>{{ $stat->status == 2 ? 'Proses Pengiriman' : '' }}</b></span>
                            @elseif ($stat->status == 3)
                              <span class="badge badge-dot mr-4"><i class="bg-info"></i> <span class="mb-0 text-sm"><b>{{ $stat->status == 3 ? 'Dikirim' : '' }}</b></span>
                            @elseif ($stat->status == 4)
                              <span class="badge badge-dot mr-4"><i class="bg-success"></i> <span class="mb-0 text-sm"><b>{{ $stat->status == 4 ? 'Barang Sudah Sampai' : '' }}</b></span>
                            @endif
                            </td>
                            <th scope="row">
                              <div class="media align-items-center">
                                 <div class="media-body">
                                    <span class="mb-0 text-sm">{{ $stat->pilihPengguna->name }}</span>
                                 </div>
                              </div>
                            </th>
                             <td class="text-right">
                                <a class="btn btn-sm btn-warning" href="{{ Route('status.edit', $stat->id_status) }}"><span class="fas fa-pencil-ruler"></span>&nbsp;EDIT</a>
                            </td>
                            <td class="text-right">
                                <form action="{{ Route('status.destroy', $stat->id_status) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger" type="submit"><span class="fas fa-eraser"></span>&nbsp;DELETE</button>
                                </form>
                            </td>   
                        </tr>
                    @endforeach
                    @else
                        <th class="mb-0 text-danger">Data status kosong !!</th>
                    @endif
                    </tbody>
                </table>
                {{ $status->links('pagin.pagin') }}
            </div>
        </div>
    </div>
</div>
@endsection