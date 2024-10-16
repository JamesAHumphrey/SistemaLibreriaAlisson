<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <h6 class="heading-small text-muted mb-4">Datos de la Categoria</h6>
                <h3>Selecciona el producto</h3>
        
                <!-- Barra de búsqueda y selección de producto -->
                <input type="text" id="productSearch" class="form-control mb-3" placeholder="Escribe el nombre del producto" oninput="filterProducts()">
        
                <!-- Lista de productos que se mostrará solo si hay coincidencias -->
                <select name="product_id" id="product_id" class="form-control" size="5" style="display: none;" onchange="loadProductDetails()">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" data-code="{{ $product->code }}" data-category="{{ $product->category->name }}">
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <script>
            function filterProducts() {
                // Obtenemos el valor del input y el select
                var input = document.getElementById('productSearch').value.toLowerCase();
                var select = document.getElementById('product_id');
                var options = select.options;
                var hasMatches = false;
        
                // Recorremos las opciones del select para filtrarlas
                for (var i = 0; i < options.length; i++) {
                    var optionText = options[i].text.toLowerCase();
                    
                    // Si el texto de la opción coincide con la búsqueda, la mostramos, si no, la ocultamos
                    if (optionText.includes(input)) {
                        options[i].style.display = "";
                        hasMatches = true;
                    } else {
                        options[i].style.display = "none";
                    }
                }
        
                // Si hay coincidencias y el campo no está vacío, mostramos la lista, si no, la ocultamos
                if (hasMatches && input !== "") {
                    select.style.display = "block";
                } else {
                    select.style.display = "none";
                }
            }
        
            function loadProductDetails() {
                // Cuando se selecciona un producto, mostramos los detalles en la consola
                var selectedProduct = document.getElementById('product_id');
                var selectedOption = selectedProduct.options[selectedProduct.selectedIndex];
                var productId = selectedOption.value;
                var productCode = selectedOption.getAttribute('data-code');
                var productCategory = selectedOption.getAttribute('data-category');
        
                console.log("Producto seleccionado ID:", productId);
                console.log("Código del producto:", productCode);
                console.log("Categoría del producto:", productCategory);
                
                // Aquí puedes agregar la lógica adicional para manejar el producto seleccionado
            }
        </script>
        
        <div class="col-lg-6">
            <div class="form-group">
                <label for="invoice_number">Número de factura</label>
                    <input type="text" id="invoice_number" name="invoice_number" class="form-control" required value="{{ old('invoice_number', $sale->invoice_number) }}">
            </div>
                            
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="input-date">Fecha</label>
                <input type="date" id="input-date" name="date" class="form-control"  value="{{ old('date') ?: (isset($sale->date) ? $sale->date : now()->format('Y-m-d')) }}" readonly required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
            <label for="input-ode">Código </label>
            <input type="text" id="input-code" name="code" class="form-control" readonly required value="{{ old('invoice_number', $sale->code) }}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="customer_name">Nombre del Cliente</label>
                    <input type="text" id="customer_name" name="customer_name" class="form-control" required value="{{ old('customer_name', $sale->customer_name) }}">
            </div>
                            
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="customer_phone">Numero del Cliente</label>
                    <input type="text" id="customer_phone" name="customer_phone" class="form-control" required value="{{ old('customer_phone', $sale->customer_phone) }}">
            </div>
                            
        </div>

        <div class="col-lg-6">
            <div class="form-group">
            <label for="purchase_price">Precio Unitario</label>
            <input type="number" id="purchase_price" name="purchase_price" class="form-control" step="0.01" >
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
            <label for="category">Categoría</label>
            <input type="text" id="category" name="category" class="form-control" readonly required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
            <label for="amount">Cantidad</label>
            <input type="number" id="amount" name="amount" class="form-control" >
            </div>
        </div>

                        
        <div class="col-lg-12">
            <div class="form-group">
            <h4 class="mt-4">Productos</h4>
            <table class="table table-bordered" id="products_table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="products_body">
                    <!-- aqui se cargan las filas dinamicas  -->
                </tbody>
            </table>
            </div>
        </div>
                        
        <div class="col-lg-12">
            <div class="form-group">
            <button type="button" class="btn btn-primary" onclick="addProductToCart()">Agregar más</button>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="form-group">
            <label for="subtotal">Subtotal</label>
            <input type="text" id="subtotal" name="subtotal" class="form-control" readonly>
            </div>
                        
        </div>
        <div class="col-lg-4">
            <div class="form-group">
            <label for="discount">Descuento (%)</label>
            <input type="number" id="discount" name="discount" class="form-control" oninput="calculateTotal()">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
            <label for="total">Gran Total</label>
            <input type="text" id="total" name="total" class="form-control" readonly value="{{ old('amount', $sale->total) }}">
            </div>
        </div>

        <!-- Campo oculto para productos -->
        <input type="hidden" name="products" id="products">
        <input type="hidden" name="code" value="{{ old('code', 'P-' . uniqid()) }}">   
                    
                
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
    let prod=[];

    function loadProductDetails() {
        // Obtener el select y la opción seleccionada
        var select = document.getElementById('product_id');
        var selectedOption = select.options[select.selectedIndex];

        // Obtener los valores de los atributos data
        var productCode = selectedOption.getAttribute('data-code');
        var categoryId = selectedOption.getAttribute('data-category');

        var categoryId = selectedOption.getAttribute('data-category');

        // Asignar los valores a los inputs correspondientes
        document.getElementById('product_code').value = productCode;
        document.getElementById('category').value = categoryId;
    }

    function addProductToCart() {
        let productId = document.getElementById('product_id').value; 
        let productName = document.getElementById('product_id').options[document.getElementById('product_id').selectedIndex].text;
        let amount = document.getElementById('amount').value;
        let purchase_price = document.getElementById('purchase_price').value;
        let total = amount * purchase_price;

        if (!productId || !amount || !purchase_price) {
            alert("Por favor, selecciona un producto y completa la cantidad y precio.");
            return;
        }

        let cartTable = document.getElementById('products_body');
        let newRow = cartTable.insertRow();

        newRow.innerHTML = `
            <td data-product-id="${productId}">${productName}</td>
            <td>${amount}</td>
            <td>${purchase_price}</td>
            <td>${total}</td>
            <td><button class="btn btn-danger" onclick="removeProduct(this)">Eliminar</button></td>
        `;

        prod.push({
            product_id: productId,
            amount: parseInt(amount),
            purchase_price: parseFloat(purchase_price),
            total: total
        });

        document.getElementById('products').value = JSON.stringify(prod);

        document.getElementById('product_id').value = '';
        document.getElementById('amount').value = '';
        document.getElementById('purchase_price').value = '';

        calculateSubtotal();
    }
    
    function removeProduct(button) {
        let row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        calculateSubtotal();
    }

    function calculateSubtotal() {
        let subtotal = 0;
        let cartRows = document.querySelectorAll('#products_body tr');

        cartRows.forEach(row => {
            let total = parseFloat(row.querySelector('td:nth-child(4)').innerText);
            subtotal += isNaN(total) ? 0 : total;
        });

        document.getElementById('subtotal').value = subtotal.toFixed(2);
        calculateTotal();
    }

    function calculateTotal() {
        let subtotal = parseFloat(document.getElementById('subtotal').value) || 0;
        let discount = parseFloat(document.getElementById('discount').value) || 0;

        let total = subtotal - (subtotal * (discount / 100));
        document.getElementById('total').value = total.toFixed(2);
    }
</script>
