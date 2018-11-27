
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-satisfied"></i></span>
    <span class="alert-inner--text">&nbsp;<strong class="text-default">Congratulations !</strong>
        {!! session('success') !!}
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-notification-70"></i></span>
    <span class="alert-inner--text">&nbsp;<strong class="text-default">Info !</strong>
        {!! session('info') !!}
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon fas fa-meh-rolling-eyes"></span>
    <span class="alert-inner--text">&nbsp;<strong class="text-default">Warning !</strong>
        {!! session('warning') !!}
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon fas fa-dizzy"></span>
    <span class="alert-inner--text">&nbsp;<strong class="text-default">Something Wrong !</strong>
        {!! session('error') !!}
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon fas fa-dizzy text-lg text-default"></span>
    <span class="alert-inner--text">&nbsp;<strong class="text-default">Something Wrong !</strong>
        @foreach($errors->all() as $error)

            {{ $error }}

        @endforeach
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif