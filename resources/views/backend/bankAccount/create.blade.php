@extends('layouts.backend')

@section('brand') Add Bank Account @endsection

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
                        <h4 class="heading-small text-muted mb-0">Create Bank Account</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="horizontal" action="{{ Route('bank.store') }}" method="POST">
                    {{ csrf_field() }}
                    
                <div class="col-md-12">
                    @include('template.alert')
                </div>

                <h6 class="heading-small text-muted mb-4">Bank Information</h6>
                    <div class="pl-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nomer Rekening</label>
                                    <input type="number" name="no_rek" class="form-control form-control-alternative" placeholder="021XXXXXXXXX" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Bank</label>
                                    <select name="name_bank" class="form-control form-control-alternative" required>
                                        <option value="" disabled selected>-- Pilih Bank --</option>
                                        <option value="1">BNI</option>
                                        <option value="2">BRI</option>
                                        <option value="3">BCA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-control-label">Atas Nama</label>
                                    <input type="text" name="ats_nama" class="form-control form-control-alternative" placeholder="Rudi Pratama" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-4">
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
