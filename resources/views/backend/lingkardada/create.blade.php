@extends('layouts.backend')

@section('brand') Lingkar Dada @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ Route('LD.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                    <div class="col-4 text-right">
                        <h4 class="heading-small text-muted mb-0">Create Lingkar Dada</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('LD.store') }}" method="POST">
                    {{ csrf_field() }}
                <div class="col-md-12">
                    @include('template.alert')
                </div>
                <h6 class="heading-small text-muted mb-4">Lingkar Dada Information</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Ukuran</label>
                                    <input type="text" name="ukuran" class="form-control form-control-alternative" placeholder="192cm,150cm,185cm" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left pt-4">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-default">Add Lingkar Dada</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
