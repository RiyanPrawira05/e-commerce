@extends('layouts.backend')

@section('brand') Jabatan @endsection

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
                              <input class="form-control form-control-alternative" type="text" name="search" placeholder="Type here for Search" value="{{ Request::get('search') }}" autocomplete="off">
                          </div>
                      </div>
                  </form>
               </div>
               <div class="row align-items-center">
                  <div class="col">
                     <h3 class="heading-small text-muted mb-0">Data Jabatan</h3>
                  </div>
                  <div class="col text-right">
                     <a href="{{ Route('jabatan.create') }}" class="btn btn-sm btn-default"><span class="fas fa-plus-circle"></span>&nbsp; ADD</a>
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
                           <th scope="col">Nama Jabatan</th>
                           <th scope="col">Slug Jabatan</th>
                           <th scope="col"></th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>

                        @if (count($jabatan) > 0)
                        @foreach ($jabatan as $key => $isijabatan)
                        <tr>
                           <td>
                              <span class="badge badge-dot mr-4"><i class="bg-danger"></i> <span class="mb-0 text-sm"><b>{{ $isijabatan->name }}</b></span>
                           </td>
                           <th>
                              <div class="media align-items-center">
                                 <div class="media-body">
                                    <span class="mb-0 text-sm">{{ $isijabatan->slug_jabatan }}</span>
                                 </div>
                              </div>
                           </th>
                           <td class="text-right">
                              <a class="btn btn-sm btn-warning" href="{{ Route('jabatan.edit', $isijabatan->id_jabatan) }}"><span class="fas fa-pencil-ruler"></span>&nbsp;EDIT</a>
                           </td>
                           <td class="text-right">
                              <form action="{{ Route('jabatan.destroy', $isijabatan->id_jabatan) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger" type="submit"><span class="fas fa-eraser"></span>&nbsp;DELETE</button>
                              </form>
                           </td>   
                        </tr>
                        @endforeach
                        @else
                             <th class="mb-0 text-danger">Data Jabatan Kosong !!</th>
                        @endif
                  </tbody>
               </table>
                  {{ $jabatan->links('pagin.pagin') }}
            </div>
@endsection