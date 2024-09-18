@extends('layouts.panel')
@section('title', 'Provider')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Providers</h3>
                        <a href="{{ route('providers.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo proveedor
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-list-ol"></i> ID</th>
                                <th scope="col"><i class="fas fa-heading"></i> Nombre</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Teléfono</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Dirección</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Email</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> RUC</th>
                                <th scope="col"><i class="fas fa-calendar-check"></i> Fecha de Registro</th>
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($providers as $provider)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $provider->id }} </span>
                                    </td>
                                    <td>
                                        {{ $provider->name }}
                                    </td>

                                    <td>
                                        {{ $provider->phone }}
                                    </td>

                                    <td>
                                        {{ $provider->address }}
                                    </td>

                                    <td>
                                        {{ $provider->email }}
                                    </td>

                                    <td>
                                        {{ $provider->ruc }}
                                    </td>

                                    <td>
                                        {{ $provider->created_at }}
                                    </td>
                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('providers.show', $provider) }}" class="btn btn-primary btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('providers.edit', $provider) }}" class="btn btn-info btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form class="Form-Delete" action="{{ route('providers.destroy', $provider->id) }}" method="POST" style="display: inline-block; margin: 0; display: flex; align-items: center;">
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
                        {{ $providers->links() }}
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

