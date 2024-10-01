@extends('layouts.panel')
@section('title', 'Movement')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Movimientos</h3>
                        <a href="{{ route('movements.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo Movimiento
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-list-ol"></i> ID</th>
                                <th scope="col"><i class="fas fa-heading"></i> Observaciones</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Cantidad</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i>Precio unitario</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i> Total</th>
                                <th scope="col"><i class="fas fa-box"></i> Fecha</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i> Precio(balance)</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i> Total(balance)</th>
                                <th scope="col"><i class="fas fa-box-open"></i> Stock(balance)</th>
                                <th scope="col"><i class="fas fa-bars"></i> Código</th>
                                <th scope="col"><i class="fas fa-check"></i> Producto</th>
                                <th scope="col"><i class="fas fa-th"></i> Transacción</th>
                                <th scope="col"><i class="fas fa-th"></i> Tipo de movimiento</th>
                                <th scope="col"><i class="fas fa-th-list"></i> Empleado</th>
                                <th scope="col"><i class="fas fa-calendar-check"></i> Fecha de Registro</th>
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movements as $movement)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $movement->id }} </span>
                                    </td>
                                    <td >
                                        {{ $movement->observation }}
                                    </td>
									<td >
                                        {{ $movement->amount }}
                                    </td>
									<td >
                                        {{ $movement->unit_value }}</td>
									<td >
                                        {{ $movement->total_value }}
                                    </td>
									<td >
                                        {{ $movement->date }}
                                    </td>
									<td >
                                        {{ $movement->unit_value_balance }}
                                    </td>
									<td >
                                        {{ $movement->total_balance }}
                                    </td>
									<td >
                                        {{ $movement->amount_balance }}
                                    </td>
									<td >
                                        {{ $movement->code }}
                                    </td>
									<td >
                                        {{ $movement->product->name }}
                                    </td>
									<td >
                                        {{ $movement->type->transaction }}
                                    </td>
                                    <td >
                                        {{ $movement->type->name }}
                                    </td>
									<td >
                                        {{ $movement->employee->name }}
                                    </td>
                                    <td>
                                        {{ $movement->created_at }}
                                    </td>
                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('movements.show', $movement) }}" class="btn btn-primary btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('movements.edit', $movement) }}" class="btn btn-info btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form class="Form-Delete" action="{{ route('movements.destroy', $movement->id) }}" method="POST" style="display: inline-block; margin: 0; display: flex; align-items: center;">
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
                        {{ $movements->links() }}
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

