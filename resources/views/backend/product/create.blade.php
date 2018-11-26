@extends('layouts.backend')

@section('brand') Product @endsection

@section('css') <link href="{{ asset('backend/select2-4.0.6-rc.1/dist/css/select2.min.css') }}" rel="stylesheet"> @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ Route('product.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                </div>
            </div>
            <form class="horizontal dropzone" action="{{ Route('product.store') }}" method="POST" enctype="multipart/form-data" id="mydropZone">
                {{ csrf_field() }}
                <div class="col-md-12">
                    @include('template.alert')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Foto</label>
                                <input type="file" name="foto" class="form-control form-control-alternative" placeholder="File: jpg, png, jpeg" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Produk</label>
                                <input type="text" name="product" class="form-control form-control-alternative" placeholder="Dinna Blouse" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Jenis</label>
                                <select name="jenis" class="form-control form-control-alternative" required>
                                @foreach ($jenis as $tipe)
                                    <option value="{{ $tipe->id_jenis }}">{{ $tipe->slug_bahan }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Category</label>
                                <select name="category" class="form-control form-control-alternative" required>
                                @foreach ($category as $categories)
                                    <option value="{{ $categories->id_category }}">{{ $categories->category }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Size</label>
                                <select multiple="multiple" name="size[]" class="form-control form-control-alternative select2" required>
                                @foreach ($size as $ukuran)
                                    <option value="{{ $ukuran->id_size }}">{{ $ukuran->size }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Harga</label>
                                <input type="number" name="harga" class="form-control form-control-alternative" placeholder="IDR 4XXXXX" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control form-control-alternative" placeholder="New Arrival, Hot Offer"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <button type="submit" class="btn btn-default">Created</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script') 

<script src="{{ asset('backend/select2-4.0.6-rc.1/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/js/dropzone.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#mydropZone').dropzone({ url: "{{ Route('product.store') }}" });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "s,m,l,xl",
            maximumSelectionLength: 4,
        });
    });
</script>

@endsection

@endsection
