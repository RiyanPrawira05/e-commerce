@extends('welcome_backend')

@section('content')

<!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-3">CREATE</div>
                    <div class="card-body px-lg-5 py-lg-5">

                    <form role="form" method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group mb-3 {{ $errors->has('foto') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('foto') ? ' is-invalid' : '' }}" placeholder="Foto" type="file" name="foto" autofocus required>
                            </div>
                         </div>
                        <div class="form-group mb-3 {{ $errors->has('product') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('product') ? ' is-invalid' : '' }}" placeholder="Product" type="text" name="product" required>
                            </div>
                         </div>
                         <div class="form-group mb-3 {{ $errors->has('jenis') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-jenis-83"></i></span>
                                </div>
                                
                                <select class="form-control {{ $errors->has('jenis') ? ' is-invalid' : '' }}" placeholder="Jenis" name="jenis" required></select>
                            </div>
                        </div>
                        <div class="form-group mb-3 {{ $errors->has('category') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-category-83"></i></span>
                                </div>
                                <select class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" placeholder="Category" name="category" required></select>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('harga') ? 'has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" placeholder="Harga" type="number" name="harga" required>
                            </div>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input name="size" class="custom-control-input" id="s" type="radio" checked value="s">
                            <label class="custom-control-label" for="s">S</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input name="size" class="custom-control-input" id="m" type="radio" value="m">
                            <label class="custom-control-label" for="m">M</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input name="size" class="custom-control-input" id="l" type="radio" value="l">
                            <label class="custom-control-label" for="l">L</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input name="size" class="custom-control-input" id="xl" type="radio" value="xl">
                            <label class="custom-control-label" for="xl">XL</label>
                        </div>
                        <div class="form-group mb-3 {{ $errors->has('deskripsi') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-deskripsi-83"></i></span>
                                </div>
                                <textarea class="form-control {{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" placeholder="Deskripsi" name="deskripsi" required></textarea>
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