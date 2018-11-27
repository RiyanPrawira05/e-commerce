@extends('layouts.backend')

@section('brand') Colors @endsection

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
                     <h3 class="mb-0 text-default">Data Colors</h3>
                  </div>
                  <div class="col text-right">
                     <a href="{{ Route('colors.create') }}" class="btn btn-icon-only btn-sm btn-default fas fa-plus-circle text-md text-white"></a>
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
                           <th scope="col">Warna</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>

                        @if (count($colors) > 0)
                        @foreach ($colors as $color)
                        <tr>
                           <td>
                              @if ($color->warna == 'Red')
                                 <span class="badge badge-dot mr-4"><i class="bg-danger"></i> <span class="mb-0 text-sm"><b>{{ $color->warna }}</b></span>
                              @elseif ($color->warna == 'Yellow')
                                 <span class="badge badge-dot mr-4"><i class="bg-warning"></i> <span class="mb-0 text-sm"><b>{{ $color->warna }}</b></span>
                              @elseif ($color->warna == 'Blue')
                                 <span class="badge badge-dot mr-4"><i class="bg-blue"></i> <span class="mb-0 text-sm"><b>{{ $color->warna }}</b></span>
                              @elseif ($color->warna == 'Green')
                                 <span class="badge badge-dot mr-4"><i class="bg-success"></i> <span class="mb-0 text-sm"><b>{{ $color->warna }}</b></span>
                              @elseif ($color->warna == 'Black')
                                 <span class="badge badge-dot mr-4"><i class="bg-default"></i> <span class="mb-0 text-sm"><b>{{ $color->warna }}</b></span>
                              @else
                                 <span class="badge badge-dot mr-4"><i class="bg-info"></i> <span class="mb-0 text-sm"><b>{{ $color->warna }}</b></span>
                              @endif
                           </td>
                           <td class="text-right">
                                 <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="fas fa-ellipsis-v"></i>
                                    </a>

                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                 <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0 text-light">Actions</h6>
                                 </div>
                                    <a class="btn dropdown-item" href="{{ Route('colors.edit', $color->id_warna) }}">
                                        <i class="fas fa-user-edit text-default"></i>
                                        <span class="text-default">Edit</span>
                                    </a>
                                 <form action="{{ Route('colors.destroy', $color->id_warna) }}" method="POST">
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
               {{ $colors->links('pagin.pagin') }}
            </div>
   @endsection