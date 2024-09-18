<h6 class="heading-small text-muted mb-4">Datos de las unidades</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            
            <div class="form-group">
                <label class="form-control-label" for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control form-control-alternative"
                    placeholder="Agregar un Nombre" value="{{ old('name', $provider->name) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-phone">Teléfono</label>
                <input type="telephone" id="input-phone" name="phone" class="form-control form-control-alternative"
                    placeholder="Agregar un número de teléfono" value="{{ old('phone', $provider->phone) }}">
            </div>
        </div>

        <div class="col-lg-12">
            
            <div class="form-group">
                <label class="form-control-label" for="input-address">Dirección</label>
                <input type="text" id="input-address" name="address" class="form-control form-control-alternative"
                    placeholder="Agregar una Dirección" value="{{ old('address', $provider->address) }}">
            </div>
            
        </div>

        <div class="col-lg-6">

            <div class="form-group">
                <label class="form-control-label" for="input-email">Email</label>
                <input type="email" id="input-email" name="email" class="form-control form-control-alternative"
                    placeholder="Agregar una email" value="{{ old('email', $provider->email) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-ruc">RUC</label>
                <input type="text" id="input-ruc" name="ruc" class="form-control form-control-alternative"
                    placeholder="Agregar una número de RUC" value="{{ old('ruc', $provider->ruc) }}">
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
