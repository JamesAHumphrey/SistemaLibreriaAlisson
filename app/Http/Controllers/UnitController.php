<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $units = Unit::paginate(10);

        return view('unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $unit = new Unit();

        return view('unit.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitRequest $request): RedirectResponse
    {
        Unit::create($request->validated());

        return Redirect::route('units.index')->with('success', 'Unit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $unit = Unit::find($id);

        return view('unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $unit = Unit::find($id);

        return view('unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitRequest $request, Unit $unit): RedirectResponse
    {
        $unit->update($request->validated());

        return Redirect::route('units.index')->with('success', 'Unit updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Unit::find($id)->delete();

        return Redirect::route('units.index')->with('success', 'Unit deleted successfully');
    }
}
