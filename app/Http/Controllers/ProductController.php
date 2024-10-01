<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Unit;
use Exception;
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
                
            FunctionController::insertMovement($product,$request);

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

    public function getProductDetails($id)
    {
        $product = Product::with('category')->find($id);
    
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['error' => 'no se encontro el producto'], 404);
        }
    }
    

}
