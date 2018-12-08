@extends('layouts.backend')

@section('brand') Jenis @endsection

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
                              <input class="form-control form-control-alternative" type="text" name="search" placeholder="Type here for Search" value="{{ request()->search }}" autocomplete>
                          </div>
                      </div>
                  </form>
               </div>
               <div class="row align-items-center">
                  <div class="col">
                     <h3 class="heading-small text-muted mb-0">Data Jenis</h3>
                  </div>
                  <div class="col text-right">
                     <a href="{{ Route('jenis.create') }}" class="btn btn-sm btn-default"><span class="fas fa-plus-circle"></span>&nbsp; ADD</a>
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
                           <th scope="col">Bahan</th>
                           <th scope="col">Deskripsi</th>
                           <th scope="col"></th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>

                        @if (count($jenis) > 0)
                        @foreach ($jenis as $model)
                        <tr>
                           <td>
                              <span class="badge badge-dot mr-4"><i class="bg-success"></i><span class="mb-0 text-sm"></span><b>{{ $model->bahan }}</b></span>
                           </td>
                           @if (!empty($model->deskripsi))
                              <td>
                                 {{ $model->deskripsi }}
                              </td>
                           @else
                              <th><span class="mb-0 text-danger">Deskripsi Belum Di Isi</span></th>
                           @endif
                              <td class="text-right">
                                   <a class="btn btn-sm btn-warning" href="{{ route('jenis.edit', $model->id_jenis) }}"><span class="fas fa-pencil-ruler"></span>&nbsp;EDIT</a>
                               </td>
                               <td class="text-right">
                                   <form action="{{ Route('jenis.destroy', $model->id_jenis) }}" method="POST">
                                   {{ method_field('DELETE') }}
                                   {{ csrf_field() }}
                                       <button class="btn btn-sm btn-danger" type="submit"><span class="fas fa-eraser"></span>&nbsp;DELETE</button>
                                   </form>
                               </td>
                           </tr>
                           @endforeach
                           @else
                                <th class="mb-0 text-danger">Data Jenis Kosong !!</th>
                           @endif
                     </tbody>
                  </table>
                     {{ $jenis->links('pagin.pagin') }}
               </div>
           </div>
       </div>
   </div>
@endsection