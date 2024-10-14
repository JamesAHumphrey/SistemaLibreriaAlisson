@extends('layouts.panel')
@section('title', 'Purchase/Show')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-newspaper"></i> Ver Compra</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('purchases.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-list"></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Información de la compra</h6>
                <div class="pl-lg-4">


                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <h1>Detalles de la Compra #{{ $purchase->id }}</h1>

                                <p><strong>Fecha:</strong> {{ $purchase->date }}</p>
                                <p><strong>Número de Factura:</strong> {{ $purchase->invoice_number }}</p>
                                <p><strong>Total:</strong> {{ $purchase->total }}</p>

                                <h2>Productos De Esta Compra</h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio de Compra</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchase->productPurchases as $productPurchase)
                                            <tr>
                                                <td>{{ $productPurchase->product->name }}</td>
                                                <td>{{ number_format($productPurchase->purchase_price, 2) }}</td>
                                                <td>{{ $productPurchase->amount }}</td>
                                                <td>{{ number_format($productPurchase->total, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

