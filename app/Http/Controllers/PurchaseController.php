<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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

        return view('purchase.create', compact('purchase'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseRequest $request): RedirectResponse
    {
        Purchase::create($request->validated());

        return Redirect::route('purchases.index')->with('success', 'Purchase created successfully.');
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
