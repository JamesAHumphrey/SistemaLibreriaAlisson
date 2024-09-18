<?php

namespace App\Http\Controllers;

use App\Models\ProductPurchase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductPurchaseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $productPurchases = ProductPurchase::paginate(10);

        return view('product-purchase.index', compact('productPurchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $productPurchase = new ProductPurchase();

        return view('product-purchase.create', compact('productPurchase'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductPurchaseRequest $request): RedirectResponse
    {
        ProductPurchase::create($request->validated());

        return Redirect::route('product-purchases.index')->with('success', 'ProductPurchase created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $productPurchase = ProductPurchase::find($id);

        return view('product-purchase.show', compact('productPurchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $productPurchase = ProductPurchase::find($id);

        return view('product-purchase.edit', compact('productPurchase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductPurchaseRequest $request, ProductPurchase $productPurchase): RedirectResponse
    {
        $productPurchase->update($request->validated());

        return Redirect::route('product-purchases.index')->with('success', 'ProductPurchase updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        ProductPurchase::find($id)->delete();

        return Redirect::route('product-purchases.index')->with('success', 'ProductPurchase deleted successfully');
    }
}
