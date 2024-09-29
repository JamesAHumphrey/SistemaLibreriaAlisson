<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Provider;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPurchase;


class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $purchases = Purchase::paginate();

        return view('purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $purchase = new Purchase();     
        $providers = Provider::all();
        $categories = Category::all();
        $products = Product::all();
        
        return view('purchase.create', compact('providers', 'categories', 'products','purchase'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseRequest $request): RedirectResponse
    {
        dd($request->all());

        // Validar los datos recibidos
        $request->validate([
            'invoice_number' => 'required|string',
            'provider_id' => 'required|exists:providers,id',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
            'date' => 'required|date',
            'code' => 'required|string',
        ]);
    
        // Crear la compra principal
        $purchase = new Purchase();
        $purchase->invoice_number = $request->invoice_number;
        $purchase->provider_id = $request->provider_id;
        $purchase->total = $request->total;
        $purchase->employee_id = auth()->user()->employee->id; 
        $purchase->date = $request->date; // Usa la fecha enviada
        $purchase->code = $request->code ?? 'P-' . uniqid(); // Asigna el código o genera uno si no está presente
        $purchase->save();
    
        // Procesar los productos
        foreach ($request->products as $product) {
            // Buscar el producto en el inventario
            $prod = Product::find($product['product_id']);
            
            // Actualizar el precio unitario si es diferente al que ya existe
            if ($prod->current_unit_price != $product['price']) {
                $prod->current_unit_price = $product['price'];
            }
    
            // Actualizar el stock sumando la cantidad
            $prod->current_stock += $product['quantity'];
            $prod->save();
    
            // Crear el registro en la tabla intermedia de productos de la compra
            ProductPurchase::create([
                'purchase_id' => $purchase->id,
                'product_id' => $product['product_id'],
                'amount' => $product['quantity'],
                'purchase_price' => $product['price'],
                'total' => $product['quantity'] * $product['price'],
            ]);
        }
    
        return redirect()->route('purchases.index')->with('success', 'Compra registrada exitosamente');
    }
    


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $purchase = Purchase::find($id);

        return view('purchase.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $purchase = Purchase::find($id);

        return view('purchase.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PurchaseRequest $request, Purchase $purchase): RedirectResponse
    {
        $purchase->update($request->validated());

        return Redirect::route('purchases.index')->with('success', 'Purchase updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Purchase::find($id)->delete();

        return Redirect::route('purchases.index')->with('success', 'Purchase deleted successfully');
    }
}
