@extends('layouts.panel')
@section('title', 'Purchase/Create')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Registrar Categoria</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('purchases.index') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-arrow-left"></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body container-fluid">
                <h2>Registrar factura</h2>
                <form action="{{ route('purchases.store') }}" method="POST" onsubmit="prepareProducts(event)">
                    @csrf
                    @include('purchase.form')
                </form>
            </div>
        </div>
    </div>

    <script>

    function prepareProducts(event) {
        event.preventDefault();
        document.getElementById('products').value = JSON.stringify(prod);
        event.target.submit();
    }
    </script>

@endsection
