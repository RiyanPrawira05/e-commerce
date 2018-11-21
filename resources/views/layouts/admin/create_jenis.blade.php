@extends('welcome_backend')

@section('content')

<!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-7">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-3">CREATE</div>
                    <div class="card-body px-lg-10 py-lg-5">

                    <form role="form" method="post" action="{{ route('add') }}">
                        {{ csrf_field() }}
                         <div class="form-group mb-3 {{ $errors->has('bahan') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('bahan') ? ' is-invalid' : '' }}" placeholder="bahan" type="text" name="bahan" autofocus required>
                            </div>
                        </div>
                        <div class="form-group mb-3 {{ $errors->has('slug_bahan') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('slug_bahan') ? ' is-invalid' : '' }}" placeholder="Slug Bahan" type="text" name="slug_bahan" required>
                            </div>
                         </div>
                        <div class="form-group {{ $errors->has('deskripsi') ? 'has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-book-bookmark"></i></span>
                                </div>
                                <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" placeholder="Deskripsi" name="deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection