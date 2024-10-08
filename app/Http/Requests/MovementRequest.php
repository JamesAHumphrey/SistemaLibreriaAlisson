<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'observation' => ['string'],
			'amount' => ['required','integer','min:1'],
			'unit_value' => ['required','numeric','min:0.01'],
			'total_value' => ['required','numeric','min:0.01'],
			'date' => ['required','date'],
			// 'unit_value_balance' => ['required','numeric','min:0'],
			// 'total_balance' => ['required','numeric','min:0'],
			// 'amount_balance' => ['required','integer','min:0'],
            'code' => ['required','string','min:1','max:16',Rule::unique('movements')->ignore($this->id)],
			'product_id' => ['required','integer'],
			'type_id' => ['required','integer'],
			// 'employee_id' => ['required','integer']
        ];
    }
    public function messages():array{
        return[
            //mensajes del campo observation
            'observation.string' => 'El tipo de dato ingresado en el campo observación no es valido',
            //mensajes del campo amount
            'amount.required' => 'El campo cantidad es requerido',
            'amount.integer' => 'El tipo de dato ingresado en el campo cantidad no es valido',
            'amount.min'=> 'El campo de cantidad no puede ser menor que 1',
            //mensajes del campo unit_value
            'unit_value.required' => 'El campo valor unitario es requerido',
            'unit_value.numeric' => 'El tipo de dato ingresado en el campo valor unitario no es valido',
            'unit_value.min'=> 'El campo de valor unitario no puede ser menor que 0.01',
            //mensajes del campo total_value
            'total_value.required' => 'El campo valor total es requerido',
            'total_value.numeric' => 'El tipo de dato ingresado en el campo valor total no es valido',
            'total_value.min'=> 'El campo de valor total no puede ser menor que 0.01',
            //mensajes del campo date
            'date.required' => 'El campo fecha es requerido',
            'date.date' => 'El tipo de dato ingresado en el campo fecha no es valido',
            //mensajes del campo code
            'code.required' => 'El código es un campo requerido',
            'code.string' => 'El tipo de dato no es valido para el campo código',
            'code.min'=> 'El campo código debe tener al menos 1 caracteres',
            'code.max'=> 'El campo código no debe tener más de 16 caracteres',
            'code.unique' => 'Ya existe un registro con el código indicado',
            //mensajes del campo product_id
            'product_id.required' => 'Producto es un campo requerido',
            'product_id.integer' => 'El tipo de dato no es valido para el campo producto',
            //mensajes del campo type_id
            'type_id.required' => 'Tipo de transacción es un campo requerido',
            'type_id.integer' => 'El tipo de dato no es valido para el campo tipo de transacción',
        ];
    }
}
