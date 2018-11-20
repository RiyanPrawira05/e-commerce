@extends('home_backend')

@section('content')

<div class="table-responsive">
    <table class="table align-items-center">
        <thead class="thead-light">
            @include('template.alert')
            <th class="mb-0 text-sm">Data Users : {!! $users->count() !!}</th>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email Addres</th>
                <th scope="col">Jabatan</th>
                <th scope="col">
                    <a href="{{ route('create') }}"><i class="fas fa-plus-circle text-sm text-success"></i></a>
                </th>
            </tr>
        </thead>
        <tbody>
        @if (count($users) > 0)
        @foreach ($users as $user)
            <tr>
                <th scope="row">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <span class="mb-0 text-sm">{{ $user->name }}</span>
                        </div>
                    </div>
                </th>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-success"></i> {!! $user->jabatan == 1 ? '<span class="mb-0 text-xs"><b>Admin</b></span>' : '<span class="mb-0 text-xs"><b>Pelanggan</b></span>' !!}
                    </span>
                </td>
                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('edit', $user->id_users) }}"><i class="fas fa-user-edit text-yellow"></i>Edit</a>
                            <a class="dropdown-item" href="{{ route('destroy', $user->id_users) }}"><i class="fas fa-user-times text-danger"></i>Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        @else
            <td align="center">Data Tidak Ditemukan !!</td>
        @endif
    </tbody>
</table>
</div>

@endsection