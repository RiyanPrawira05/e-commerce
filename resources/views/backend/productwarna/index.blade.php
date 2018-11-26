   @extends('layouts.backend')

   @section('brand') Product Colors @endsection

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
                     <h3 class="mb-0 text-default">Data Product Colors</h3>
                  </div>
                  <div class="col text-right">
                     <a href="{{ Route('Pcolors.create') }}" class="btn btn-icon-only btn-sm btn-default fas fa-plus-circle text-md text-white"></a>
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
                           <th scope="col">Product</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>

                        @if (count($productwarna) > 0)
                        @foreach ($productwarna as $color)
                        <tr>
                           <td>
                              @if ($color->pilihWarna->warna == 'Red')
                                 <span class="badge badge-dot mr-4"><i class="bg-danger"></i> <span class="mb-0 text-sm"><b>{{ $color->pilihWarna->warna }}</b></span>
                              @elseif ($color->pilihWarna->warna == 'Yellow')
                                 <span class="badge badge-dot mr-4"><i class="bg-warning"></i> <span class="mb-0 text-sm"><b>{{ $color->pilihWarna->warna }}</b></span>
                              @elseif ($color->pilihWarna->warna == 'Blue')
                                 <span class="badge badge-dot mr-4"><i class="bg-blue"></i> <span class="mb-0 text-sm"><b>{{ $color->pilihWarna->warna }}</b></span>
                              @elseif ($color->pilihWarna->warna == 'Green')
                                 <span class="badge badge-dot mr-4"><i class="bg-success"></i> <span class="mb-0 text-sm"><b>{{ $color->pilihWarna->warna }}</b></span>
                              @elseif ($color->pilihWarna->warna == 'Black')
                                 <span class="badge badge-dot mr-4"><i class="bg-default"></i> <span class="mb-0 text-sm"><b>{{ $color->pilihWarna->warna }}</b></span>
                              @else
                                 <span class="badge badge-dot mr-4"><i class="bg-info"></i> <span class="mb-0 text-sm"><b>{{ $color->pilihWarna->warna }}</b></span>
                              @endif
                           </td>
                           <td>{{ $color->pilihProduct->product }}</td>
                           <td class="text-right">
                                 <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="fas fa-ellipsis-v"></i>
                                    </a>

                                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                 <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0 text-light">Actions</h6>
                                 </div>
                                    <a class="btn dropdown-item" href="{{ Route('Pcolors.edit', $color->id_product_warna) }}">
                                        <i class="fas fa-user-edit text-default"></i>
                                        <span class="text-default">Edit</span>
                                    </a>
                                 <form action="{{ Route('Pcolors.destroy', $color->id_product_warna) }}" method="POST">
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
               {{ $productwarna->links('pagin.pagin') }}
            </div>
   @endsection