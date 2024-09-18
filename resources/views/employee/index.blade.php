@extends('layouts.panel')
@section('title', 'Employee')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Empleados</h3>
                        <a href="{{ route('employees.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nueva Empleados
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-list-ol"></i> ID</th>
                                <th scope="col"><i class="fas fa-heading"></i> Nombres</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Apellidos</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Código</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Género</th>
                                <th scope="col"><i class="fas fa-list-ol"></i> Usuario</th>
                                <th scope="col"><i class="fas fa-calendar-check"></i> Fecha de Registro</th>
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $employee->id }} </span>
                                    </td>
                                    <td>
                                        {{ $employee->name }}
                                    </td>

                                    <td>
                                        {{ $employee->surname }}
                                    </td>

                                    <td>
                                        {{ $employee->code }}
                                    </td>
                                    
                                    <td>
                                        {{ $employee->gender }}
                                    </td>

                                    <td>
                                        {{ $employee->user->name }}
                                    </td>

                                    <td>
                                        {{ $employee->created_at }}
                                    </td>
                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('employees.show', $employee) }}" class="btn btn-primary btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-info btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form class="Form-Delete" action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline-block; margin: 0; display: flex; align-items: center;">
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
                        {{ $employees->links() }}
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

