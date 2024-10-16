@extends('layouts.panel')
@section('title', 'Purchase/Show')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow-lg">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-newspaper"></i> INFORMACION DE LA COMPRA</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('purchases.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-list"></i> Volver
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                <div class="pl-lg-4">
                    <div class="text-center my-4"> <!-- Espaciado vertical -->
                    </hr> <!-- Línea superior -->
                        <h1>Detalles de la compra número: {{ $purchase->id }}</h1>
                </hr> <!-- Línea inferior -->
                    </div>
                    
                    <!-- Sección de Información de la Factura y Proveedor -->
                    <div class="row">
                        <!-- Datos de la Factura -->
                        <div class="col-12 col-md-6 mb-4 d-flex">
                            <div class="form-group details-box flex-fill">
                                <h2 class="text-center">Datos de la factura</h2>
                                <p class="detail-text">
                                    <strong>Fecha:</strong> 
                                    <span>{{ $purchase->date }}</span>
                                </p>
                                <p class="detail-text">
                                    <strong>Número de Factura:</strong> 
                                    <span>{{ $purchase->invoice_number }}</span>
                                </p>
                                <p class="detail-text">
                                    <strong>Total:</strong> 
                                    <span class="text-success">{{ number_format($purchase->total, 2) }}</span>
                                </p>
                            </div>
                        </div>
                    
                        <!-- Datos del Proveedor -->
                        <div class="col-12 col-md-6 mb-4 d-flex">
                            <div class="form-group details-box flex-fill">
                                <h2 class="text-center">Datos del proveedor</h2>
                                <p class="detail-text">
                                    <strong>Nombre:</strong> 
                                    <span>{{ $purchase->provider->name }}</span>
                                </p>
                                <p class="detail-text">
                                    <strong>Teléfono:</strong> 
                                    <span>{{ $purchase->provider->phone }}</span>
                                </p>
                                <p class="detail-text">
                                    <strong>Correo:</strong> 
                                    <span>{{ $purchase->provider->email }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Tabla de Productos -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
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

    <!-- Custom Styles -->
    <style>
        .card {
            border-radius: 20px;
            padding: 20px;
        }

        .details-box {
            background: #f7f9fa;
            padding: 20px;
            border-radius: 15px;
            border: 1px solid #ddd;
            box-shadow: 0px 5px 10px rgba(211, 10, 134, 0.1);
            text-align: left;
            min-height: 200px; /* Establecer una altura mínima para ambos cuadros */
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #502c2c;
        }

        .detail-text {
            font-size: 1rem;
            margin: 5px 0;
        }

        .table {
            margin-top: 20px;
            font-size: 1rem;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
            transition: all 0.3s ease;
        }

        .table-bordered th, .table-bordered td {
            border: 2px solid #dee2e6;
        }

        .thead-dark th {
            background-color: #343a40;
            color: white;
        }

        .text-success {
            font-weight: bold;
            color: #28a745 !important;
        }
    </style>
@endsection
