<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MovementRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $movements = Movement::paginate(10);

        return view('movement.index', compact('movements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $movement = new Movement();

        return view('movement.create', compact('movement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovementRequest $request): RedirectResponse
    {
        Movement::create($request->validated());

        return Redirect::route('movements.index')->with('success', 'Movement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $movement = Movement::find($id);

        return view('movement.show', compact('movement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $movement = Movement::find($id);

        return view('movement.edit', compact('movement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovementRequest $request, Movement $movement): RedirectResponse
    {
        $movement->update($request->validated());

        return Redirect::route('movements.index')->with('success', 'Movement updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Movement::find($id)->delete();
        return Redirect::route('movements.index')->with('success', 'Movement deleted successfully');
    }
}
