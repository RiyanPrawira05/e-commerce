@extends('layouts.backend')

@section('brand') Size @endsection

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
                     <h3 class="mb-0 text-default">Data Size</h3>
                  </div>
                  <div class="col text-right">
                     <a href="{{ Route('size.create') }}" class="btn btn-icon-only btn-sm btn-default fas fa-plus-circle text-md text-white"></a>
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
                           <th scope="col">Size</th>
                           <th scope="col">Deskripsi</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>

                        @if (count($size) > 0)
                        @foreach ($size as $ukuran)
                        <tr>
                           <td>
                              @if ($ukuran->size == 'S')
                                 <span class="badge badge-dot mr-4"><i class="bg-danger"></i> <span class="mb-0 text-sm"><b>{{ $ukuran->size }}</b></span>
                              @elseif ($ukuran->size == 'M')
                                 <span class="badge badge-dot mr-4"><i class="bg-warning"></i> <span class="mb-0 text-sm"><b>{{ $ukuran->size }}</b></span>
                              @elseif ($ukuran->size == 'L')
                                 <span class="badge badge-dot mr-4"><i class="bg-info"></i> <span class="mb-0 text-sm"><b>{{ $ukuran->size }}</b></span>
                              @elseif ($ukuran->size == 'XL')
                                 <span class="badge badge-dot mr-4"><i class="bg-success"></i> <span class="mb-0 text-sm"><b>{{ $ukuran->size }}</b></span>
                              @else
                                 <span class="badge badge-dot mr-4"><i class="bg-default"></i> <span class="mb-0 text-sm"><b>{{ $ukuran->size }}</b></span>
                              @endif
                           </td>
                           <th>
                              <div class="media align-items-center">
                                 <div class="media-body">
                                    <span class="mb-0 text-sm">{{ $ukuran->deskripsi }}</span>
                                 </div>
                              </div>
                           </th>
                           <td class="text-right">
                                 <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="fas fa-ellipsis-v"></i>
                                    </a>

                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                 <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0 text-light">Actions</h6>
                                 </div>
                                    <a class="btn dropdown-item" href="{{ Route('size.edit', $ukuran->id_size) }}">
                                        <i class="fas fa-user-edit text-default"></i>
                                        <span class="text-default">Edit</span>
                                    </a>
                                 <form action="{{ Route('size.destroy', $ukuran->id_size) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
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
                             <th class="mb-0 text-danger">Data Tidak Ditemukan !!</th>
                        @endif
                  </tbody>
               </table>
               {{ $size->links('pagin.pagin') }}
            </div>
   @endsection