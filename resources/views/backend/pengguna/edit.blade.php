@extends('layouts.backend')

@section('brand') Edit Users @endsection

@section('css') 
<link rel="stylesheet" href="{{ asset('backend/plugins/dist/css/dropify.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ Route('users.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                    <div class="col-4 text-right">
                        <h4 class="heading-small text-muted mb-0">Edit Users</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @include('template.alert')

            <div class="card-body">
                <form class="horizontal" action="{{ Route('users.update', $users->id_users) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <h6 class="heading-small text-muted mb-4">User Information</h6>
                    <div class="pl-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Nama</label>
                                <input type="text" name="name" class="form-control form-control-alternative" placeholder="Ryan Pratama" value="{{ $users->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="email" name="email" class="form-control form-control-alternative" placeholder="pratama@gmail.com" value="{{ $users->email }}">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">

                <h6 class="heading-small text-muted mb-4">Hak Akses</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hak Akses</label>
                                    <select class="form-control form-control-alternative" name="jabatan" required>
                                      <option value="" selected disabled>-- Pilih Hak akses --</option>
                                      @foreach ($jabatan as $posisi => $value)
                                        <option value="{{ $value->id_jabatan }}" {{ $users->jabatan == $value->id_jabatan ? 'selected' : '' }}>{{ $value->name }}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left pt-4">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-default">Change Users</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="col-md-12 mb-3">
    <div class="card shadow">
        <div class="card-header border-1">
            <div class="row align-items-center">
                <div class="col-8">
                    <h4 class="heading-small text-muted mb-0">Photo Pofile</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="horizontal" action="{{ Route('users.foto', $users->id_users) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
            <h6 class="heading-small text-muted mb-4">Your Photos</h6>
                <div class="pl-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset($users->foto) }}" class="dropify" disabled="disabled" data-default-file="{{ asset($users->foto) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class="heading-small text-muted mb-4">Uploads Your Photos</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="foto" class="form-control form-control-alternative dropify dropify-event" id="foto" data-allowed-file-extensions="jpg jpeg png gif" data-max-file-size="2M" data-show-errors="true" data-height="300">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-left pt-4">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-default">Change Photo</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row align-items-center">
                    <h4 class="heading-small text-muted mb-0">New Password</h4>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('users.password', $users->id_users) }}" method="POST">
                    {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Password</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">New Password</label>
                                    <input type="password" name="password" class="form-control form-control-alternative" placeholder="Masukan Password Baru">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control form-control-alternative" placeholder="Masukan Ulang Password">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-left pt-4">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-default">Change Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
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
