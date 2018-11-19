
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong> {!! session('success') !!} </strong>
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong> {!! session('info') !!} </strong> <!-- ini tuh yang with('info', 'nah yang disini nya bukan') dan tanda seru ini buat nangkep htmlnya misal '<span>Berhasil</span>' -- >
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong> {!! session('warning') !!} </strong> <!-- ini juga ada tanda seru 2 -- >
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong> {!! session('error') !!} </strong>
    </div>
@endif

@if (count($errors) > 0) <!-- Ini buat proses ketika banyak eror dia akan melakukan perulangan berkali-kali bukan? misal ada 3 input yang belum di isi maka dia menampilan eror sbnyak 3x bahwa inputan kosong ? -->
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p>Perhatian.</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>

@endif