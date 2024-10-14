<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\FunctionController;
use Illuminate\Support\Facades\Auth;
use App\Models\Provider;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPurchase;
use Termwind\Components\Dd;

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

    public function store(PurchaseRequest $request): RedirectResponse
    {
        try{
            DB::beginTransaction();

            $products = json_decode($request->input('products'), true);
            $validatedData = $request->validated();
            $validatedData['code'] = FunctionController::generateCodeCompras();
            $validatedData['employee_id'] = Auth::user()->employee->id;
            $purchase = Purchase::create($validatedData);


            // Procesar los productos
            foreach ($products as $prod) {
                // Buscar el producto en el inventario
                $product = Product::find($prod['product_id']);

                // Actualizar el stock sumando la cantidad
                $product->current_stock += $prod['amount'];
                $product->save();

                // Crear el registro en la tabla intermedia de productos de la compra
                ProductPurchase::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $prod['product_id'],
                    'amount' => $prod['amount'],
                    'purchase_price' => $prod['purchase_price'],
                    'total' => $prod['amount'] * $prod['purchase_price'],
                ]);
            }

            DB::commit();
            return redirect()->route('purchases.index')->with('success', 'Compra registrada exitosamente');

        }
        catch(Exception $e){
            DB::rollBack();
            return Redirect::route('purchases.index')->with('error','Ocurrió un error inesperado: '.$e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        /**
         * Codigo anterior que estaba en show
         *
         *$purchase = Purchase::find($id);

            * return view('purchase.show', compact('purchase'));
         */

         $purchase = Purchase::with('productPurchases.product')->findOrFail($id);
        return view('purchase.show', compact('purchase'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $purchase = Purchase::find($id);
        $providers = Provider::all();
        $categories = Category::all();
        $products = Product::all();

        return view('purchase.edit', compact('providers', 'categories', 'products','purchase'));

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
