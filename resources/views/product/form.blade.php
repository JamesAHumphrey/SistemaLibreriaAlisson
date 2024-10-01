<h6 class="heading-small text-muted mb-4">Datos del Producto</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            
            <div class="form-group">
                <label class="form-control-label" for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control form-control-alternative"
                    placeholder="Agregar el Nombre del producto" value="{{ old('name', $product->name) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-description">Descripción</label>
                <input type="text" id="input-description" name="description" class="form-control form-control-alternative"
                    placeholder="Agregar la descripción del producto" value="{{ old('description', $product->description) }}">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label" for="input-retail_price">Precio al Detalle</label>
                <input type="number" id="input-retail_price" name="retail_price" class="form-control form-control-alternative"
                    placeholder="Precio al detalle" value="{{ old('retail_price', $product->retail_price) }}">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label" for="input-wholesale_price">Precio para mayoritas</label>
                <input type="number" id="input-wholesale_price" name="wholesale_price" class="form-control form-control-alternative"
                    placeholder="Precio al por mayor" value="{{ old('wholesale_price', $product->wholesale_price) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-code">Código</label>
                <input type="text" id="input-code" name="code" class="form-control form-control-alternative"
                    placeholder="Ingresa el código del producto" value="{{ old('code', $product->code) }}">
            </div>
        </div>

        
        
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="input-category_id">Categorias</label>
                <select class="form-control form-control-alternative" name="category_id" id="input-category_id">
                    <option disabled @selected(true)>Seleccionar una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @selected(old('category_id', $product->category_id)== $category->id)>
                            {{$category->name}}
                        </option> 
                    @endforeach
                    
                </select>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="input-unit_id">Unidades</label>
                <select class="form-control form-control-alternative" name="unit_id" id="input-unit_id">
                    <option disabled @selected(true)>Seleccionar una Unidad</option>
                    @foreach ($units as $unit)
                        <option value="{{$unit->id}}" @selected(old('unit_id', $product->unit_id)== $unit->id)>
                            {{$unit->name}}
                        </option> 
                    @endforeach
                    
                </select>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="input-brand_id">Marcas</label>
                <select class="form-control form-control-alternative" name="brand_id" id="input-brand_id">
                    <option disabled @selected(true)>Seleccionar una marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{$brand->id}}" @selected(old('brand_id', $product->brand_id)== $brand->id)>
                            {{$brand->name}}
                        </option> 
                    @endforeach
                    
                </select>
            </div>
        </div>
        
        <div class="col-lg-12">
            <hr class="my-4" />
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label class="form-control-label">Inventario Inicial</label>
                <div class="">
                    <label class="btn btn-secondary" for="input-initial_inventory">
                        <input type="checkbox" id="input-initial_inventory" name="initial_inventory"
                        {{ old('initial_inventory', $product->initial_inventory) ? 'checked' : '' }}> Inventario
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pl-lg-4" id="inventory-fields" style="display: block">
    <div class="">
        <div class="col-lg-12">
            <hr class="my-4" />
            <h6 class="heading-small text-muted mb-4">Inventario Inicial</h6>
        </div>
        {{-- <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-movement_code">Código</label>
                <input type="text" id="input-movement_code" name="movement_code" class="form-control form-control-alternative"
                    placeholder="Ingresa el código del movimiento" >
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label" for="input-current_unit_price">Precio unitario </label>
                <input type="number" id="input-current_unit_price" name="current_unit_price" class="form-control form-control-alternative"
                    placeholder="Precio unitario" value="{{ old('current_unit_price', $product->current_unit_price) }}">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label" for="input-current_stock">Existencias</label>
                <input type="number" id="input-current_stock" name="current_stock" class="form-control form-control-alternative"
                    placeholder="Existencias" value="{{ old('current_stock', $product->current_stock) }}">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label" for="input-minimum_stocks">Existencias mínimas</label>
                <input type="number" id="input-minimum_stocks" name="minimum_stocks" class="form-control form-control-alternative"
                    placeholder="Existencias mínimas" value="{{ old('minimum_stocks', $product->minimum_stocks) }}">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label" for="input-current_total">Inversión total</label>
                <input type="number" id="input-current_total" name="current_total" class="form-control form-control-alternative"
                    placeholder="0.00" value="{{ old('current_total', $product->current_total) }}" readonly>
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
    document.addEventListener('DOMContentLoaded', function() {
        const toggleInventory = document.getElementById('input-initial_inventory');
        const inventoryFields = document.getElementById('inventory-fields');
        const inputs = inventoryFields.querySelectorAll('input, select, textarea, button');

        toggleInventory.addEventListener('change', function() {
            if (toggleInventory.checked) {
                inventoryFields.style.display = 'block';
                inputs.forEach(input => input.disabled = false);
            } else {
                inventoryFields.style.display = 'none';
                inputs.forEach(input => input.disabled = true);
            }
        });

        // Inicializar el estado al cargar la página
        toggleInventory.dispatchEvent(new Event('change'));
    });

    document.addEventListener('DOMContentLoaded', function() {
        const unitPriceInput = document.getElementById('input-current_unit_price');
        const stocksInput = document.getElementById('input-current_stock');
        const totalInput = document.getElementById('input-current_total');

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