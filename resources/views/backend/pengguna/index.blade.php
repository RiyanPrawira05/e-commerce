@extends('layouts.backend')

@section('brand') Pengguna @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="text-center">
                  <form class="horizontal" method="GET">
                      <div class="col-md-12">
                          <div class="form-group">
                              <button type="submit" class="btn btn-sm btn-primary mb-3"><span class="fas fa-search"></span></button>
                              <input class="form-control form-control-alternative" type="text" name="search" placeholder="Type here for Search" value="{{ request()->search }}" autofocus>
                          </div>
                      </div>
                  </form>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0 text-default">Data Pengguna</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ Route('users.create') }}" class="btn btn-icon-only btn-sm btn-default fas fa-plus-circle text-md text-white"></a>
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
                            <th scope="col">Name</th>
                            <th scope="col">Email Addres</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
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
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fas fa-ellipsis-v"></i>
                                    </a>

                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0 text-light">Actions</h6>
                                </div>

                                    <a class="btn dropdown-item" href="{{ Route('users.edit', $user->id_users) }}">
                                        <i class="fas fa-user-edit text-default"></i>
                                        <span class="text-default">Edit</span>
                                    </a>
                                    <form action="{{ Route('users.destroy', $user->id_users) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                      <button class="btn dropdown-item" type="submit">
                                          <i class="fas fa-user-times text-default"></i>
                                          <span class="text-default">Delete</span>
                                      </button>
                                    </form>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <th class="mb-0 text-danger">Data Pengguna Tidak Ditemukan !!</th>
                    @endif
                    </tbody>
                </table>
                {{ $users->links('pagin.pagin') }}
            </div>
        </div>
    </div>
</div>
@endsection