<h6 class="heading-small text-muted mb-4">Datos del empleado</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            
            <div class="form-group">
                <label class="form-control-label" for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control form-control-alternative"
                    placeholder="Agregar el Nombre del empleado" value="{{ old('name', $employee->name) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-surname">Apellidos</label>
                <input type="text" id="input-surname" name="surname" class="form-control form-control-alternative"
                    placeholder="Agregar el apellido del empleado" value="{{ old('surname', $employee->surname) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-code">Código</label>
                <input type="text" id="input-code" name="code" class="form-control form-control-alternative"
                    placeholder="Ingresa el código del empleado" value="{{ old('code', $employee->code) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-gender">Género</label>
                <select class="form-control form-control-alternative" name="gender" id="gender">
                    <option disabled @selected(true)>Selecciona un género</option>
                    <option value="M" @selected(old('gender', $employee->gender)== 'M')>Masculino</option>
                    <option value="F" @selected(old('gender', $employee->gender)== 'F')>Femenino</option>
                </select>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-user_id">Usuarios</label>
                <select class="form-control form-control-alternative" name="user_id" id="user_id">
                    <option disabled @selected(true)>Seleccionar el usuario</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}" @selected(old('user_id', $employee->user_id)== $user->id)>
                            {{$user->name}}
                        </option> 
                    @endforeach
                    
                </select>
            </div>
        </div>
        
    </div>
</div>

<hr class="my-4" />
<!-- Contenido -->
<h6 class="heading-small text-muted mb-4">Guardar</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Registrar
        </button>
    </div>
</div>
