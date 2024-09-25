<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Movement;
use App\Models\Type;
use App\Models\Unit;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $products = Product::with(['category','unit','brand'])->paginate(10);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $product = new Product();
        $units = Unit::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.create', compact('product','units','categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        try{
            
            if (!$request->initial_inventory) {
                Product::create($request->validated());
            return Redirect::route(route: 'products.index')->with('success', 'Producto creado de manera exitosa.');      
            }

            DB::beginTransaction();

                //Creación del producto
                $product = Product::create($request->validated());
                //Asignación y calculo de valores
                $request['movement_code'] = Movement::generateCode();
                $request['product_id'] = $product->id;
                $request['employee_id'] = Auth::user()->employee->id;
                $request['current_total'] = $request['current_stock'] * $request['current_unit_price'];

                $movementData = [
                    'observation' => 'Entrada de Inventario inicial',
                    'amount' => $request['current_stock'],
                    'unit_value' => $request['current_unit_price'],
                    'total_value' => $request['current_total'],
                    'date' => Carbon::now(),
                    'unit_value_balance' => $request['current_unit_price'],
                    'total_balance' => $request['current_total'],
                    'amount_balance' => $request['current_stock'],
                    'code' => $request['movement_code'],
                    'product_id' => $request['product_id'],
                    'type_id' => Type::where('name','Inventario Inicial')->pluck('id')->first(),
                    'employee_id' => $request['employee_id'],
                ];

                Movement::create($movementData);
                DB::commit();
                return Redirect::route('products.index')->with('success', 'Producto creado de manera exitosa.');


        } catch(Exception $e){
            DB::rollBack();
            return Redirect::route('products.index')->with('error','Ocurrió un error inesperado: '.$e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $product = Product::find($id);
        $units = Unit::all();
        $categories = Category::all();
        $brands = Brand::all();

        return view('product.edit', compact('product','units','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return Redirect::route('products.index')->with('success', 'Producto actualizado de manera exitosa.');
    }

    public function destroy($id): RedirectResponse
    {
        Product::find($id)->delete();

        return Redirect::route('products.index')->with('success', 'Producto eliminado de manera exitosa.');
    }
}
