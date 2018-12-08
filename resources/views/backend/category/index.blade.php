@extends('layouts.backend')

@section('brand') Category @endsection

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
                     <h3 class="heading-small text-muted mb-0">Data Category</h3>
                  </div>
                  <div class="col text-right">
                     <a href="{{ Route('category.create') }}" class="btn btn-sm btn-default"><span class="fas fa-plus-circle"></span>&nbsp; ADD</a>
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
                           <th scope="col">Category</th>
                           <th scope="col">Deskripsi</th>
                           <th scope="col"></th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>

                        @if (count($category) > 0)
                        @foreach ($category as $categories)
                        <tr>
                           <td>
                              <span class="badge badge-dot mr-4"><i class="bg-success"></i> <span class="mb-0 text-sm"><b>{!! $categories->category !!}</b></span>
                           </td>
                           <td>
                              {{ $categories->deskripsi }}
                           </td>
                           <td class="text-right">
                              <a class="btn btn-sm btn-warning" href="{{ Route('category.edit', $categories->id_category) }}"><span class="fas fa-pencil-ruler"></span>&nbsp;EDIT</a>
                           </td>
                            <td class="text-right">
                                <form action="{{ Route('category.destroy', $categories->id_category) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger" type="submit"><span class="fas fa-eraser"></span>&nbsp;DELETE</button>
                                </form>
                            </td>
                        </tr>
                           @endforeach
                           @else
                                <th class="mb-0 text-danger">Data Category Kosong !!</th>
                           @endif
                     </tbody>
                  </table>
                  {{ $category->links('pagin.pagin') }}
               </div>
@endsection