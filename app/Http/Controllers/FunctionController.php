<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FunctionController extends Controller
{
    public static function insertMovement($product, $request){
        //Asignación y calculo de valores
        $request['movement_code'] = FunctionController::generateCode();
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
    }

    public static function generateCode(): string
    {
        $lastMovement = Movement::orderBy('id', 'desc')->first();
        $lastCode = $lastMovement ? $lastMovement->code : null;

        if ($lastCode) {
            $lastNumber = (int) str_replace('INI-', '', $lastCode);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return 'INI-' . $newNumber;
    }

    public static function generateCodeCompras(): string
    {
        $lastMovement = Purchase::orderBy('id', 'desc')->first();
        $lastCode = $lastMovement ? $lastMovement->code : null;

        if ($lastCode) {
            $lastNumber = (int) str_replace('COM-', '', $lastCode);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return 'COM-' . $newNumber;
    }

    public static function generateCodeVentas(): string
    {
        $lastMovement = Sale::orderBy('id', 'desc')->first();
        $lastCode = $lastMovement ? $lastMovement->code : null;

        if ($lastCode) {
            $lastNumber = (int) str_replace('COM-', '', $lastCode);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return 'COM-' . $newNumber;
    }
}
