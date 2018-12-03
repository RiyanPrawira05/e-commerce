@extends('layouts.backend')

@section('brand') Edit Category @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ Route('category.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                </div>
            </div>
            <form class="horizontal" action="{{ Route('category.update', $data->id_category) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-12">
                    @include('template.alert')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Category</label>
                                <input type="text" name="category" class="form-control form-control-alternative" placeholder="Mens" value="{{ $data->category }}" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Slug</label>
                                <input type="text" name="slug_category" class="form-control form-control-alternative" placeholder="Men" value="{{ $data->slug_category }}" required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <button type="submit" class="btn btn-default">Change</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection