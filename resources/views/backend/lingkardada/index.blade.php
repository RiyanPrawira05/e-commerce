@extends('layouts.backend')

@section('brand') Lingkar Dada @endsection

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
                              <input class="form-control form-control-alternative" type="text" name="search" placeholder="Type here for Search" value="{{ request()->search }}" autocomplete="off">
                          </div>
                      </div>
                  </form>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                         <h3 class="heading-small text-muted mb-0">Data Lingkar Dada</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ Route('LD.create') }}" class="btn btn-sm btn-default"> <span class="fas fa-plus-circle"></span>&nbsp; ADD</a>
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
                            <th scope="col">Lingkar Dada</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($lingkardada) > 0)
                    @foreach ($lingkardada as $ld)
                        <tr>
                            <td class="text-right">
                              <span class="badge badge-dot mr-2"><i class="bg-default"></i> <span class="mb-0 text-sm"><b>{{ $ld->ukuran }}</b></span>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-warning" href="{{ Route('LD.edit', $ld->id_lingkar_dada) }}"><span class="fas fa-pencil-ruler"></span>&nbsp;EDIT</a>
                            </td>
                            <td>
                                <form action="{{ Route('LD.destroy', $ld->id_lingkar_dada) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger" type="submit"><span class="fas fa-eraser"></span>&nbsp;DELETE</button>
                                </form>
                            </td>   
                        </tr>
                    @endforeach
                    @else
                        <th class="mb-0 text-danger">Data lingkar dada kosong !!</th>
                    @endif
                    </tbody>
                </table>
                {{ $lingkardada->links('pagin.pagin') }}
            </div>
        </div>
    </div>
</div>
@endsection