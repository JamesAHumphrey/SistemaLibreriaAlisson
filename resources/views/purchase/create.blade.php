@extends('layouts.panel')
@section('title', 'Purchase.create')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Registrar Compra</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-arrow-left"></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body container-fluid">
                <h2>Registrar Factura</h2>
                <form action="{{ route('purchases.store') }}" method="POST">
                    @csrf

                    <h3>Selecciona el producto</h3>
                    <select name="product_id" id="product_id" class="form-control" onchange="loadProductDetails()">
                        <option value="">Selecciona un Producto</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    

                    <div class="row">
                        <div class="col-md-6">
                            <label for="invoice_number">Número de factura</label>
                            <input type="text" id="invoice_number" name="invoice_number" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="provider_id">Proveedor</label>
                            <select id="provider_id" name="provider_id" class="form-control" required>
                                @foreach($providers as $provider)
                                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="date">Fecha</label>
                            <input type="text" id="date" name="date" class="form-control" value="{{ now() }}" readonly required>
                        </div>
                        <div class="col-md-6">
                            <label for="product_code">Código del Producto</label>
                            <input type="text" id="product_code" name="product_code" class="form-control" readonly required>
                        </div>
                        <div class="col-md-6">
                            <label for="unit_price">Precio Unitario</label>
                            <input type="number" id="unit_price" name="unit_price" class="form-control" step="0.01" >
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="category">Categoría</label>
                            <input type="text" id="category" name="category" class="form-control" readonly required>
                        </div>
                        <div class="col-md-6">
                            <label for="quantity">Cantidad</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" >
                        </div>
                    </div>

                    <h4 class="mt-4">Productos</h4>
                    <table class="table table-bordered" id="products_table">
                        <thead>
                            <tr>
                                <th>Categoría</th>
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
                    <button type="button" class="btn btn-primary" onclick="addProductToCart()">Agregar más</button>

                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label for="subtotal">Subtotal</label>
                            <input type="text" id="subtotal" name="subtotal" class="form-control" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="discount">Descuento (%)</label>
                            <input type="number" id="discount" name="discount" class="form-control" oninput="calculateTotal()">
                        </div>
                        <div class="col-md-4">
                            <label for="total">Gran Total</label>
                            <input type="text" id="total" name="total" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Campo oculto para productos -->
                    <input type="hidden" name="products" id="products">
                    <input type="hidden" name="code" value="{{ old('code', 'P-' . uniqid()) }}">

                    
                    <button type="submit" class="btn btn-success mt-4">Registrar</button>

                    <script>
                        function loadProductDetails() {
                            let productId = document.getElementById('product_id').value;

                            if (productId) {
                                fetch(`/products/${productId}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        document.getElementById('category').value = data.category.name;
                                        document.getElementById('product_code').value = data.code;
                                        document.getElementById('unit_price').value = data.current_unit_price;
                                    })
                                    .catch(error => console.error('Error:', error));
                            } else {
                                document.getElementById('category').value = '';
                                document.getElementById('product_code').value = '';
                                document.getElementById('unit_price').value = '';
                            }
                        }

                        function addProductToCart() {
                            let productId = document.getElementById('product_id').value; 
                            let productName = document.getElementById('product_id').options[document.getElementById('product_id').selectedIndex].text;
                            let category = document.getElementById('category').value;
                            let quantity = document.getElementById('quantity').value;
                            let price = document.getElementById('unit_price').value;
                            let total = quantity * price;

                            if (!productId || !quantity || !price) {
                                alert("Por favor, selecciona un producto y completa la cantidad y precio.");
                                return;
                            }

                            let cartTable = document.getElementById('products_body');
                            let newRow = cartTable.insertRow();


                                newRow.innerHTML = `
                                    <td>${category}</td>
                                    <td data-product-id="${productId}">${productName}</td>
                                    <td>${quantity}</td>
                                    <td>${price}</td>
                                    <td>${total}</td>
                                    <td><button class="btn btn-danger" onclick="removeProduct(this)">Eliminar</button></td>
                                `;

                                 // Agregar log aquí para ver los datos antes de agregarlos al carrito pinches datos aqui si llegan 
                                 console.log({
                                    product_id: productId,
                                    product_name: productName,
                                    category: category,
                                    quantity: quantity,
                                    price: price,
                                    total: total
                                });

                            // Clear fields
                            document.getElementById('product_id').value = '';
                            document.getElementById('category').value = '';
                            document.getElementById('quantity').value = '';
                            document.getElementById('unit_price').value = '';

                            calculateSubtotal();
                        }




                        function removeProduct(button) {
                            let row = button.parentNode.parentNode;
                            row.parentNode.removeChild(row);
                            calculateSubtotal();
                        }

                        document.addEventListener('DOMContentLoaded', function() {
                            document.querySelector('form').addEventListener('submit', function(event) {
                                event.preventDefault();
                                console.log("Formulario enviado"); // Para depuración (no se ejecuta)

                                event.preventDefault();

                                let cartRows = document.querySelectorAll('#products_body tr');
                                let products = [];

                                cartRows.forEach(row => {
                                    let productId = row.cells[1].dataset.productId; 
                                    let quantity = row.cells[2].innerText;
                                    let price = row.cells[3].innerText;

                                    products.push({
                                        product_id: productId,
                                        quantity: parseInt(quantity),
                                        price: parseFloat(price),
                                    });
                                });

                                console.log("Productos a enviar:", products); // Verificar que esto se ejecute (no se ejecuta)

                                document.getElementById('products').value = JSON.stringify(products);
                                event.target.submit();
                            });
                        });



                        function calculateSubtotal() {
                            let subtotal = 0;
                            let cartRows = document.querySelectorAll('#products_body tr');

                            cartRows.forEach(row => {
                                let total = parseFloat(row.querySelector('td:nth-child(5)').innerText);
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
                </form>
            </div>
        </div>
    </div> 
@endsection

