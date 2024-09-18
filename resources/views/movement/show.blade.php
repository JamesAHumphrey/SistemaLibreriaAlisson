@extends('layouts.app')

@section('template_title')
    {{ $movement->name ?? __('Show') . " " . __('Movement') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Movement</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('movements.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Observation:</strong>
                                    {{ $movement->observation }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Amount:</strong>
                                    {{ $movement->amount }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Unit Value:</strong>
                                    {{ $movement->unit_value }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Total Value:</strong>
                                    {{ $movement->total_value }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Date:</strong>
                                    {{ $movement->date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Unit Value Balance:</strong>
                                    {{ $movement->unit_value_balance }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Total Balance:</strong>
                                    {{ $movement->total_balance }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Amount Balance:</strong>
                                    {{ $movement->amount_balance }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Code:</strong>
                                    {{ $movement->code }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Product Id:</strong>
                                    {{ $movement->product_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Type Id:</strong>
                                    {{ $movement->type_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Employee Id:</strong>
                                    {{ $movement->employee_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
