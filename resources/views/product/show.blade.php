@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? __('Show') . " " . __('Product') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $product->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Description:</strong>
                                    {{ $product->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Retail Price:</strong>
                                    {{ $product->retail_price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Wholesale Price:</strong>
                                    {{ $product->wholesale_price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Current Stock:</strong>
                                    {{ $product->current_stock }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Current Total:</strong>
                                    {{ $product->current_total }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Current Unit Price:</strong>
                                    {{ $product->current_unit_price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Minimum Stocks:</strong>
                                    {{ $product->minimum_stocks }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Code:</strong>
                                    {{ $product->code }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Category Id:</strong>
                                    {{ $product->category_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Unit Id:</strong>
                                    {{ $product->unit_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
