@extends('layouts.panel')
@section('title', 'Employee/Show')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-newspaper"></i> Ver Empleado</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('employees.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-list"></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Información del Empleado</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-heading"></i>
                                    Nombres</label>
                                <p>{{ $employee->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-heading"></i>
                                    Apellidos</label>
                                <p>{{ $employee->surname }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="title"><i class="fas fa-heading"></i>
                                    Código</label>
                                <p>{{ $employee->code }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="content"><i class="fas fa-venus-mars"></i>
                                    Género</label>
                                <p>{{ $employee->gender }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="content"><i class="fas fa-user"></i>
                                    Usuario</label>
                                <p>{{ $employee->user->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

