@extends('layouts.backend')

@section('brand') Add Product @endsection

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
                        <h4 class="heading-small text-muted mb-0">Create Product</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('product.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="col-md-12">
                    @include('template.alert')
                </div>
                <h6 class="heading-small text-muted mb-4">Photo Product</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Photo</label>
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
                                        <label class="form-control-label">Name Product</label>
                                        <input type="text" name="product" class="form-control form-control-alternative" placeholder="Dinna Blouse" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Jenis</label>
                                        <select name="jenis" class="form-control form-control-alternative" required>
                                        <option value="" disabled selected>-- Pilih Jenis --</option>
                                        @foreach ($jenis as $tipe)
                                            <option value="{{ $tipe->id_jenis }}">{{ $tipe->bahan }}</option>
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
                                            <option value="{{ $categories->id_category }}">{{ $categories->category }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Harga</label>
                                        <input type="number" name="harga" class="form-control form-control-alternative" placeholder="IDR 4XXXXX" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Size</label>
                                        <select multiple="multiple" name="size[]" class="form-control form-control-alternative sizes" required>
                                        @foreach ($size as $ukuran)
                                            <option value="{{ $ukuran->id_size }}">{{ $ukuran->size }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Warna</label>
                                        <select multiple="multiple" name="warna" class="form-control form-control-alternative colors" required>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id_warna }}">{{ $color->warna }}</option>
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
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-control-label">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control form-control-alternative" placeholder="New Arrival, Hot Offer"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-left pt-4">
                                <div class="col-md-12 mb-2">
                                    <button type="submit" class="btn btn-default">Add Product</button>
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
        $('.sizes').select2({
            placeholder: 'Size yang tersedia : s/m/l/xl',
            maximumSelectionLength: 4,
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.colors').select2({
            placeholder: 'Warna : red/blue/black/yellow',
            maximumSelectionLength: 5,
        });
    });
</script>

@endsection

@endsection
