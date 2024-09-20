@extends('layouts.panel')
@section('title', 'Product/Show')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-newspaper"></i> Ver Producto</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-list"></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Información del Producto</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-heading"></i>
                                    Nombre</label>
                                <p>{{ $product->name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-list-ol"></i>
                                    Descripción</label>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-dollar-sign"></i>
                                    Precio al detalle</label>
                                <p>{{ $product->retail_price }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-dollar-sign"></i>
                                    Precio al por mayor</label>
                                <p>{{ $product->wholesale_price }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-box"></i>
                                    Existencias</label>
                                <p>{{ $product->current_stock }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-dollar-sign"></i>
                                    Total invertido</label>
                                <p>{{ $product->current_total }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-dollar-sign"></i>
                                    Precio en Inventario</label>
                                <p>{{ $product->current_unit_price }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-box-open"></i>
                                    Minimo de Existencias</label>
                                <p>{{ $product->minimum_stocks }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-dollar-sign"></i>
                                    Código</label>
                                <p>{{ $product->code }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="content"><i class="fas fa-check"></i>
                                    Categoría</label>
                                <p>{{ $product->category->name }}</p>
                            </div>
                        </div> 
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="content"><i class="fas fa-th"></i>
                                    Unidades</label>
                                <p>{{ $product->unit->name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="content"><i class="fas fa-th"></i>
                                    Marca</label>
                                <p>{{ $product->brand->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

