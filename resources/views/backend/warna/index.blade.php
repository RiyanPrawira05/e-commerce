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
                     <h3 class="heading-small text-muted mb-0">Data Colors</h3>
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
                           <td>
                              <a class="btn btn-sm btn-warning" href="{{ Route('colors.edit', $color->id_warna) }}"><span class="fas fa-pencil-ruler"></span>&nbsp;EDIT</a>
                           </td>
                           <td>
                              <form action="{{ Route('colors.destroy', $color->id_warna) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger" type="submit"><span class="fas fa-eraser"></span>&nbsp;DELETE</button>
                              </form>
                           </td>    
                        </tr>
                     @endforeach
                     @else
                        <th class="mb-0 text-danger">Data Colors Kosong !!</th>
                     @endif
               </tbody>
            </table>
               {{ $colors->links('pagin.pagin') }}
         </div>
@endsection