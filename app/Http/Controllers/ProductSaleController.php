<?php

namespace App\Http\Controllers;

use App\Models\ProductSale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductSaleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productSales = ProductSale::paginate(10);

        return view('product-sale.index', compact('productSales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productSale = new ProductSale();

        return view('product-sale.create', compact('productSale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductSaleRequest $request): RedirectResponse
    {
        ProductSale::create($request->validated());

        return Redirect::route('product-sales.index')->with('success', 'ProductSale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productSale = ProductSale::find($id);

        return view('product-sale.show', compact('productSale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productSale = ProductSale::find($id);

        return view('product-sale.edit', compact('productSale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductSaleRequest $request, ProductSale $productSale): RedirectResponse
    {
        $productSale->update($request->validated());

        return Redirect::route('product-sales.index')->with('success', 'ProductSale updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        ProductSale::find($id)->delete();

        return Redirect::route('product-sales.index')->with('success', 'ProductSale deleted successfully');
    }
}
