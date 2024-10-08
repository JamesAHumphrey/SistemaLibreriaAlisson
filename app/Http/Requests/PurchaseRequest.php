<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class PurchaseRequest extends FormRequest
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
			'total' => ['required','numeric','min:0.01'],
			'date' => ['required','date'],
			'invoice_number' => ['required','string'],
			'code' => ['required', 'string', 'min:1', 'max:16', Rule::unique('purchases')->ignore($this->route('purchase'))],
            'provider_id'=> ['integer'],
        ];
    }

    public function messages():array{
        return[
            //mensajes del campo amount
            'total.required' => 'El campo total es requerido',
            'total.numeric' => 'El tipo de dato ingresado en el campo total no es valido',
            'total.min'=> 'El campo de total no puede ser menor que 0.01',
            //mensajes del campo date
            'date.required' => 'El campo fecha es requerido',
            'date.date' => 'El tipo de dato ingresado en el campo fecha no es valido',
            //mensajes del campo invoice_number
            'invoice_number.required' => 'El campo número de factura es requerido',
            'invoice_number.string' => 'El tipo de dato ingresado en el campo número de factura no es valido',
            //mensajes del campo code
            'code.required' => 'El código es un campo requerido',
            'code.string' => 'El tipo de dato no es valido para el campo código',
            'code.min'=> 'El campo código debe tener al menos 1 caracteres',
            'code.max'=> 'El campo código no debe tener más de 16 caracteres',
            'code.unique' => 'Ya existe un registro con el código indicado',
            //mensajes del campo provider_id
            'provider_id.integer' => 'El tipo de dato no es valido para el campo proveedor',
        ];
    }
}
