@extends('welcome_backend')

@section('content')

<!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-5">CREATE</div>
                    <div class="card-body px-lg-5 py-lg-5">

                    @include('template.alert')

                    <form role="form" method="post" action="{{ route('update', $users->id_users) }}">
                        {{ csrf_field() }}
                        <div class="form-group mb-3 {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" type="text" name="name" value="{{ $users->name }}" autofocus required>
                            </div>
                         </div>
                         <div class="form-group mb-3 {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Email" type="email" name="email" value="{{ $users->email }}" autofocus required>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" type="password" name="password" value="{{ $users->password }}" required>
                            </div>
                            <div class="text-muted font-italic">
                                <small>password strength:<span class="text-success font-weight-700">strong</span></small>
                             </div>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input name="jabatan" class="custom-control-input" id="admin" type="radio" checked value="1" {{ $users->jabatan == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="admin">1</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input name="jabatan" class="custom-control-input" id="user" type="radio" value="2" {{ $users->jabatan == 2 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="user">2</label>
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