@extends('layouts.app')

@section('template_title')
    {{ $purchase->name ?? __('Show') . " " . __('Purchase') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Purchase</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('purchases.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Total:</strong>
                                    {{ $purchase->total }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Date:</strong>
                                    {{ $purchase->date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Invoice Number:</strong>
                                    {{ $purchase->invoice_number }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Code:</strong>
                                    {{ $purchase->code }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Provider Id:</strong>
                                    {{ $purchase->provider_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Employee Id:</strong>
                                    {{ $purchase->employee_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
