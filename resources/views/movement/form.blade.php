<h6 class="heading-small text-muted mb-4">Datos del movimiento</h6>
<div class="pl-lg-4">
    <div class="row">



        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="input-type_id">Tipo de movimiento</label>
                <select class="form-control form-control-alternative" name="type_id" id="input-type_id">
                    <option disabled @selected(true)>Seleccionar un tipo</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}" @selected(old('type_id', $movement->type_id) == $type->id)>
                            {{$type->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            
            <div class="form-group">
                <label class="form-control-label" for="input-observation">Observaciones</label>
                <input type="text" id="input-observation" name="observation" class="form-control form-control-alternative"
                    placeholder="Agregar observaciones del movimiento realizado" value="{{ old('observation', $movement->observation) }}">
            </div>
        </div>

        <div class="col-lg-8">
            <div class="form-group">
                <label class="form-control-label" for="input-product_id">Productos</label>
                <select class="form-control form-control-alternative" name="product_id" id="input-product_id">
                    <option disabled @selected(true)>Seleccionar el producto</option>
                    @foreach ($products as $product)
                        <option value="{{$product->id}}" @selected(old('product_id', $movement->product_id)== $product->id)>
                            {{$product->name}}
                        </option> 
                    @endforeach
                    
                </select>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="input-code">Código</label>
                <input type="text" id="input-code" name="code" class="form-control form-control-alternative"
                    placeholder="Agregar el código" value="{{ old('code', $movement->code) }}" >
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="form-control-label" for="input-date">Date</label>
                <input type="date" id="input-date" name="date" value="{{ old('date', $movement->date) }}" class="form-control form-control-alternative"
                    placeholder="Select Date">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label" for="input-amount">Cantidad</label>
                <input type="number" id="input-amount" name="amount" class="form-control form-control-alternative"
                    placeholder="Ingresa la cantidad" value="{{ old('amount', $movement->amount) }}">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label" for="input-unit_value">Precio Unitario</label>
                <input type="number" id="input-unit_value" name="unit_value" class="form-control form-control-alternative"
                    placeholder="Ingresa el precio unitario" value="{{ old('unit_value', $movement->unit_value) }}" disabled="true">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label" for="input-total_value">Total</label>
                <input type="number" id="input-total_value" name="total_value" class="form-control form-control-alternative" disabled="true"
                    placeholder="Total" value="{{ old('total_value', $movement->total_value) }}">
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

<script>
    document.getElementById('input-type_id').addEventListener('change', function() {
        var selectedValue = this.options[this.selectedIndex].text;
        var unitValueInput = document.getElementById('input-unit_value');
        var totalValueInput = document.getElementById('input-total_value');

        if (selectedValue === 'Inventario inicial') {
            unitValueInput.disabled = false;
            totalValueInput.disabled = false;
        } else {
            unitValueInput.disabled = true;
            totalValueInput.disabled = true;
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const unitPriceInput = document.getElementById('input-unit_value');
        const stocksInput = document.getElementById('input-amount');
        const totalInput = document.getElementById('input-total_value');

        function formatNumber(value) {
            return parseFloat(value).toFixed(2);
        }

        function calculateTotal() {
            const unitPrice = parseFloat(unitPriceInput.value) || 0;
            const stocks = parseFloat(stocksInput.value) || 0;
            const total = unitPrice * stocks;
            totalInput.value = total.toFixed(2);
        }

        function formatInput(event) {
            const value = event.target.value;
            if (value) {
                event.target.value = formatNumber(value);
            }
        }

        // totalInput.value = '0.00';

        unitPriceInput.addEventListener('input', calculateTotal);
        stocksInput.addEventListener('input', calculateTotal);

        unitPriceInput.addEventListener('blur', formatInput);
    });
</script>
