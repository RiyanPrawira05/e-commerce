@extends('layouts.backend')

@section('brand') Edit Bank Account @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row align-items-center">
                    <div class="col-8">
                        <a href="{{ Route('bank.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-chevron-circle-left"></i> Back </a>
                    </div>
                    <div class="col-4 text-right">
                        <h4 class="heading-small text-muted mb-0">Edit Bank Account</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('bank.update', $accountBank->id_bank) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                <div class="col-md-12">
                    @include('template.alert')
                </div>

                <h6 class="heading-small text-muted mb-4">Bank Information</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nomer Rekening</label>
                                    <input type="number" name="no_rek" class="form-control form-control-alternative"  value="{{ $accountBank->no_rek }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Bank</label>
                                    <select name="name_bank" class="form-control form-control-alternative" value="{{ $accountBank->name_bank }}" required>
                                        <option value="" disabled selected>-- Pilih Bank --</option>
                                        <option value="1" {{ $accountBank->name_bank == 1 ? 'selected' : '' }}>BNI</option>
                                        <option value="2" {{ $accountBank->name_bank == 2 ? 'selected' : '' }}>BRI</option>
                                        <option value="3" {{ $accountBank->name_bank == 3 ? 'selected' : '' }}>BCA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-control-label">Atas Nama</label>
                                    <input type="text" name="ats_nama" class="form-control form-control-alternative" placeholder="Rudi Pratama" value="{{ $accountBank->ats_nama }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right pt-4">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-default">Add Account Bank</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection
