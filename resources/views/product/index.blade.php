@extends('layouts.panel')
@section('title', 'Product')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Productos</h3>
                        <a href="{{ route('products.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo Producto
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-list-ol"></i> ID</th>
                                <th scope="col"><i class="fas fa-heading"></i> Nombre</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Description</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i>Precio Detalle</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i> Precio por Mayor</th>
                                <th scope="col"><i class="fas fa-box"></i> Stock</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i> Total Invertido</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i> Precio en Inventario</th>
                                <th scope="col"><i class="fas fa-box-open"></i> Stock Minimo</th>
                                <th scope="col"><i class="fas fa-bars"></i> código</th>
                                <th scope="col"><i class="fas fa-check"></i> Categoría</th>
                                <th scope="col"><i class="fas fa-th"></i> Unidad</th>
                                <th scope="col"><i class="fas fa-th-list"></i> Marca</th>
                                <th scope="col"><i class="fas fa-th-list"></i> Inventario inicial</th>
                                <th scope="col"><i class="fas fa-calendar-check"></i> Fecha de Registro</th>
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $product->id }} </span>
                                    </td>
                                    <td >
                                        {{ $product->name }}
                                    </td>
									<td >
                                        {{ $product->description }}
                                    </td>
									<td >
                                        {{ $product->retail_price }}
                                    </td>
									<td >
                                        {{ $product->wholesale_price }}
                                    </td>
									<td >
                                        {{ $product->current_stock }}
                                    </td>
									<td >
                                        {{ $product->current_total }}
                                    </td>
									<td >
                                        {{ $product->current_unit_price }}
                                    </td>
									<td >
                                        {{ $product->minimum_stocks }}
                                    </td>
									<td >
                                        {{ $product->code }}
                                    </td>
									<td >
                                        {{ $product->category->name }}
                                    </td>
									<td >
                                        {{ $product->unit->name }}
                                    </td>

                                    <td >
                                        {{ $product->brand->name}}
                                    </td>

                                    <td >
                                        {{ $product->initial_inventory}}
                                    </td>

                                    <td>
                                        {{ $product->created_at }}
                                    </td>
                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-info btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form class="Form-Delete" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block; margin: 0; display: flex; align-items: center;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="..." class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $('.Form-Delete').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'El registro será eliminado permanentemente',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#01499B',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                }).then((result) => {
                if (result.isConfirmed) {
                    this.submit()
                }
            })
        })
    </script>
@endsection

