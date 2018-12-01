@extends('layouts.backend')

@section('brand') Tambah Pengguna @endsection

@section('css') 
<link rel="stylesheet" href="{{ asset('backend/plugins/dist/css/dropify.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ Route('users.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                </div>
            </div>

            <form class="horizontal" action="{{ Route('users.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-12">
                    @include('template.alert')
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Foto</label>
                                <input type="file" name="foto" class="form-control form-control-alternative dropify dropify-event" id="foto" data-allowed-file-extensions="jpg jpeg png gif" data-max-file-size="2M" data-show-errors="true" data-height="300">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Nama</label>
                                <input type="text" name="name" class="form-control form-control-alternative" placeholder="Ryan Pratama" autofocus required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="email" name="email" class="form-control form-control-alternative" placeholder="pratama@gmail.com" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-alternative" placeholder="******" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Confrim Password</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-alternative" placeholder="******" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Jabatan</label>
                                <select class="form-control form-control-alternative" name="jabatan" required>
                                  <option value="" selected disabled>-- Pilih Jabatan --</option>
                                  @foreach ($jabatan as $posisi => $value)
                                    <option value="{{ $value->id_jabatan }}">{{ $value->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Status</label>
                                <input type="text" name="status" class="form-control form-control-alternative" placeholder="Online/Offline" required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script') 
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

                $('.dropify').dropify();

                var drEvent = $('.dropify-event').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.filename + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });
            });
</script>
@endsection

@endsection
