@extends('layouts.backend')

@section('brand') Add Via @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ Route('via.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                    <div class="col-4 text-right">
                        <h4 class="heading-small text-muted mb-0">Create Via</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('via.store') }}" method="POST">
                    {{ csrf_field() }}
                <div class="col-md-12">
                    @include('template.alert')
                </div>
                <h6 class="heading-small text-muted mb-4">Via</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
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
                        </div>
                    </div>
                    <div class="text-left pt-3">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-default">Add Via</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection