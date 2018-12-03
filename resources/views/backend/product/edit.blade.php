@extends('layouts.backend')

@section('brand') Edit Product @endsection

@section('css') 
<link href="{{ asset('backend/select2-4.0.6-rc.1/dist/css/select2.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('backend/plugins/dist/css/dropify.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ Route('product.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                    <div class="col-4 text-right">
                        <h4 class="heading-small text-muted mb-0">Edit Product</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('product.update', $product->id_product) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <div class="col-md-12">
                    @include('template.alert')
                </div>
                <h6 class="heading-small text-muted mb-4">Photo Product</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Your Photos</label>
                                    <img src="{{ asset($product->foto) }}" class="dropify" disabled="disabled" data-default-file="{{ asset($product->foto) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Upload Photos</label>
                                    <input type="file" name="foto" class="form-control form-control-alternative dropify dropify-event" id="foto" data-allowed-file-extensions="jpg jpeg png gif" data-max-file-size="2M" data-show-errors="true" data-height="300">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">

                    <h6 class="heading-small text-muted mb-4">Product Information</h6>
                        <div class="pl-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Produk</label>
                                        <input type="text" name="product" class="form-control form-control-alternative" placeholder="Dinna Blouse" value="{{ $product->product }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Jenis</label>
                                        <select name="jenis" class="form-control form-control-alternative" required>
                                        <option value="" disabled selected>-- Pilih Jenis --</option>
                                        @foreach ($jenis as $tipe)
                                            <option value="{{ $tipe->id_jenis }}" {{ $tipe->id_jenis == $product->jenis ? 'selected' : ''}}>{{ $tipe->slug_bahan }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Category</label>
                                        <select name="category" class="form-control form-control-alternative" required>
                                        <option value="" disabled selected>-- Pilih Category --</option>
                                        @foreach ($category as $categories)
                                            <option value="{{ $categories->id_category }}" {{ $categories->id_category == $product->category ? 'selected' : ''}}>{{ $categories->category }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Harga</label>
                                        <input type="number" name="harga" class="form-control form-control-alternative" placeholder="IDR 4XXXXX" value="{{ $product->harga }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Size</label>
                                        <select multiple="multiple" name="size[]" class="form-control form-control-alternative select2" required>
                                        @foreach ($size as $ukuran)
                                            <option value="{{ $ukuran->id_size }}" {{ $ukuran->id_size == $product->size ? 'selected' : ''}}>{{ $ukuran->size }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <hr class="my-4">

                    <h6 class="heading-small text-muted mb-4">Description</h6>
                        <div class="pl-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control form-control-alternative" placeholder="New Arrival, Hot Offer">{{ $product->deskripsi }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-left pt-4">
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-default">Created</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script') 

<script src="{{ asset('backend/select2-4.0.6-rc.1/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/plugins/dist/js/dropify.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>

<script type="text/javascript">
    $('.dropify').dropify({
    messages: {
        'default': 'Drag and drop or click your photo product here',
        'replace': 'Drag and drop or click your photo product here to replace',
        'remove':  'Remove',
        'fileSize': 'The file size is too big',
        'imageFormat': 'The image format is not allowed',
        'maxWidth': 'The image width is too big',
        'maxHeight': 'The image height is too big'
    }

});
</script>

<script type="text/javascript">

            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();


                // Used events
                var drEvent = $('.dropify-event').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.filename + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });
            });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Size yang tersedia : s/m/l/xl',
            maximumSelectionLength: 4,
        });
    });
</script>

@endsection

@endsection
