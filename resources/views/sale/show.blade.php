@extends('layouts.app')

@section('template_title')
    {{ $sale->name ?? __('Show') . " " . __('Sale') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Sale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('sales.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Price:</strong>
                                    {{ $sale->price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Amount:</strong>
                                    {{ $sale->amount }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Customer Name:</strong>
                                    {{ $sale->customer_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Customer Phone:</strong>
                                    {{ $sale->customer_phone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Subtotal:</strong>
                                    {{ $sale->subtotal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Total:</strong>
                                    {{ $sale->total }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Discount:</strong>
                                    {{ $sale->discount }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Invoice Number:</strong>
                                    {{ $sale->invoice_number }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Code:</strong>
                                    {{ $sale->code }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Employee Id:</strong>
                                    {{ $sale->employee_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
