
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-inner--text">
        <strong> {!! session('success') !!} </strong>
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon">!</span>
    <span class="alert-inner--text">
        <strong> {!! session('info') !!} </strong>
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon">!</span>
    <span class="alert-inner--text">
        <strong> {!! session('warning') !!} </strong>
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon">!</span>
    <span class="alert-inner--text">
        <strong> {!! session('error') !!} </strong>
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon">! Perhatian</span>
    <span class="alert-inner--text">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif