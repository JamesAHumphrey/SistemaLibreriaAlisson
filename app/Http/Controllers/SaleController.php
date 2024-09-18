<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

        return view('sale.create', compact('sale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request): RedirectResponse
    {
        Sale::create($request->validated());

        return Redirect::route('sales.index')->with('success', 'Sale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $sale = Sale::find($id);

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
