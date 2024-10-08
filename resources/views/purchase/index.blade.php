@extends('layouts.panel')
@section('title', 'Purchase')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Compras</h3>
                        <a href="{{ route('purchases.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nueva Compra
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-list-ol"></i> ID</th>
                                <th scope="col"><i class="fas fa-heading"></i> Total</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Fecha</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Número de factura</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Proveedor</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Empleado</th> 
                                <th scope="col"><i class="fas fa-calendar-check"></i> Fecha de Registro</th>
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchases as $purchase)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $purchase->id }} </span>
                                    </td>
                                    <td>
                                        {{ $purchase->total }}
                                    </td>

                                    <td>
                                        {{ $purchase->date }}
                                    </td>

                                    <td>
                                        {{ $purchase->invoice_number }}
                                    </td>

                                    <td>
                                        {{ $purchase->provider->name }}
                                    </td>

                                    <td>
                                        {{ $purchase->employee->name }}
                                    </td>

                                    <td>
                                        {{ $purchase->created_at }}
                                    </td>
                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('purchases.show', $purchase) }}" class="btn btn-primary btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('purchases.edit', $purchase) }}" class="btn btn-info btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form class="Form-Delete" action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display: inline-block; margin: 0; display: flex; align-items: center;">
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
                        {{ $purchases->links() }}
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

