<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $employees = Employee::with(['user'])->paginate(10);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $employee = new Employee();
        $users = User::all();
        return view('employee.create', compact('employee','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $username = substr($validated['name'], 0, 3) . str_replace(' ', '', $validated['surname']);      
            // Eliminar espacios del campo name para la cotraseña y correo
            $cleanedName = str_replace(' ', '', $validated['name']);
            $password = $cleanedName . date('Y');
            $userCount = User::where('name', $validated['name'])->count();
            // Generar un correo temporal
            $email = $cleanedName . $userCount . '@temporal.com';

            $user = User::create([
                'name' => $username,
                'email' => $email,
                'password' => bcrypt($password),
            ]);

            $validated['user_id'] = $user->id;
    
            // Crear el empleado
            Employee::create($validated);
    
            DB::commit();
            return Redirect::route('employees.index')->with('success', 'Empleado creado de manera exitosa.');
        } catch (Exception $e) {
            DB::rollBack();
            return Redirect::route('employees.index')->with('error', 'Ocurrió un error inesperado: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $employee = Employee::find($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $employee = Employee::find($id);
        $users = User::all();
        return view('employee.edit', compact('employee','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $employee->update($request->validated());
        return Redirect::route('employees.index')->with('success', 'Empleado actualizado de manera exitosa.');
    }

    public function destroy($id): RedirectResponse
    {
        Employee::find($id)->delete();
        return Redirect::route('employees.index')->with('success', 'Empleado eliminado de manera exitosa.');
    }
}
