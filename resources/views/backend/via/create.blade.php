@extends('layouts.backend')

@section('brand') Via @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{ Route('via.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                </div>
            </div>
            <form class="horizontal" action="{{ Route('via.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-12">
                    @include('template.alert')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Via</label>
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="via" class="custom-control-input" id="ATM" type="radio" value="ATM">
                                        <label class="custom-control-label" for="ATM">ATM</label>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="via" class="custom-control-input" id="COD" type="radio" value="COD">
                                        <label class="custom-control-label" for="COD">COD</label>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <button type="submit" class="btn btn-default">Created</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection