@extends('layouts.backend')

@section('brand') Bank Account @endsection

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
                              <input class="form-control form-control-alternative" type="text" name="search" placeholder="Search" value="{{ Request::get('search') }}" autocomplete>
                          </div>
                      </div>
                  </form>
               </div>
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="heading-small text-muted mb-0">Data Bank Account</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ Route('bank.create') }}" class="btn btn-sm btn-default"><span class="fas fa-plus-circle"></span>&nbsp; ADD</a>
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
                            <th scope="col">Bank</th>
                            <th scope="col">No Rekening</th>
                            <th scope="col">Atas Nama</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($accountBank) > 0)
                    @foreach ($accountBank as $key => $bank)
                        <tr>
                            @if ($bank->name_bank == 1)
                                <td><span class="badge badge-dot mr-4"><i class="bg-success"></i><b>{{ $bank->name_bank == 1 ? 'BNI' : '' }}</b></td>
                            @elseif ($bank->name_bank == 2)
                                <td><span class="badge badge-dot mr-4"><i class="bg-success"></i><b>{{ $bank->name_bank == 2 ? 'BRI' : '' }}</b></td>
                            @elseif ($bank->name_bank == 3)
                                <td><span class="badge badge-dot mr-4"><i class="bg-success"></i><b>{{ $bank->name_bank == 3 ? 'BCA' : '' }}</b></td>
                            @endif
                            <th>{{ $bank->no_rek }}</th>
                            <th>{{ $bank->ats_nama }}</th>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ Route('bank.edit', $bank->id_bank)}}"><span class="fas fa-pencil-ruler"></span>&nbsp;EDIT</a>
                            </td>
                            <td>
                                <form action="{{ Route('bank.destroy', $bank->id_bank)}}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger" type="submit"><span class="fas fa-eraser"></span>&nbsp;DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <th class="mb-0 text-danger">Data Account Bank Tidak Ditemukan !!</th>
                    @endif
                    </tbody>
                </table>
                {{ $accountBank->links('pagin.pagin') }}
            </div>
        </div>
    </div>
</div>
@endsection