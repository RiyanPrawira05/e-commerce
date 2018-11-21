@extends('layouts.backend')

@section('brand') Pengguna @endsection

@section('header')
<!-- Card stats -->
<div class="row">
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
              <span class="h2 font-weight-bold mb-0">350,897</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                <i class="fas fa-chart-bar"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
              <span class="h2 font-weight-bold mb-0">2,356</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                <i class="fas fa-chart-pie"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
            <span class="text-nowrap">Since last week</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
              <span class="h2 font-weight-bold mb-0">924</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
            <span class="text-nowrap">Since yesterday</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
              <span class="h2 font-weight-bold mb-0">49,65%</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                <i class="fas fa-percent"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Data Pengguna</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ Route('users.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-user-plus"></i> Tambah</a>
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
                            <th>Name</th>
                            <th>Email Addres</th>
                            <th>Jabatan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($users) > 0)
                    @foreach ($users as $user)
                        <tr>
                            <td><span class="font-weight-bold">{{ $user->name }}</span></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->jabatan == 1 ? 'Administrator' : 'Pengguna' }}</td>
                            <td>
                                <a href="{{ Route('users.edit', $user->id_users) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-primary">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <td align="center">Data Tidak Ditemukan !!</td>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection