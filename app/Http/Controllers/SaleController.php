<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FunctionController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSale;
use App\Http\Requests\SaleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sales = Sale::paginate(10);

        return view('sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sale = new Sale();
        $categories = Category::all();
        $products = Product::all();

        return view('sale.create', compact('categories','products','sale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request): RedirectResponse
    {
        try{
            DB::beginTransaction();
            
            $products = json_decode($request->input('products'), true);
            $validatedData = $request->validated();
            $validatedData['code'] = FunctionController::generateCodeVentas();
            $validatedData['employee_id'] = Auth::user()->employee->id;        
            $sale = Sale::create($validatedData);


            // Procesar los productos
            foreach ($products as $prod) {
                // Buscar el producto en el inventario
                $product = Product::find($prod['product_id']);
            
                // Actualizar el stock sumando la cantidad
                $product->current_stock -= $prod['amount'];
                $product->save();

                // Crear el registro en la tabla intermedia de productos de la venta
                ProductSale::create([
                    'sale_id' => $sale->id,
                    'product_id' => $prod['product_id'],
                    'amount' => $prod['amount'],
                    'purchase_price' => $prod['purchase_price'],
                    'total' => $prod['amount'] * $prod['purchase_price'],
                   
                   
                    
                ]);
            }   

            DB::commit();
            return redirect()->route('sales.index')->with('success', 'Venta registrada exitosamente');

        }
        catch(Exception $e){
            DB::rollBack();
            return Redirect::route('sales.index')->with('error','Ocurrió un error inesperado: '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $sale = Sale::with('productSales.product')->findOrFail($id);
        return view('sale.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $sale = Sale::find($id);

        return view('sale.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaleRequest $request, Sale $sale): RedirectResponse
    {
        $sale->update($request->validated());

        return Redirect::route('sales.index')->with('success', 'Sale updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Sale::find($id)->delete();

        return Redirect::route('sales.index')->with('success', 'Sale deleted successfully');
    }
}
