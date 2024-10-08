<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaleRequest extends FormRequest
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
			'date' => ['required','date'],
			'customer_name' => ['string', 'min:1','max:50'],
			'customer_phone' => ['string', 'min:1','max:20'],
			'subtotal' => ['required','numeric','min:0.01'],
			'total' => ['required','numeric','min:0.01'],
			'discount' => ['required','numeric'],
			'invoice_number' => ['required','string'],
            'code' => ['required','min:1','max:16', Rule::unique('sales')->ignore($this->route('sale'))],
        ];
    }
    public function messages():array{
        return[
            //mensajes del campo total
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

            'customer_name.string' => 'El tipo de dato no es valido para el campo nombre del cliente',
            'customer_name.min'=> 'El campo de nombre del cliente debe tener al menos 1 caracteres',
            'customer_name.max'=> 'El campo de nombre del cliente no debe tener más de 50 caracteres',
            
            'customer_phone.string' => 'El tipo de dato no es valido para el campo teléfono del cliente',
            'customer_phone.min'=> 'El campo de teléfono del cliente debe tener al menos 1 caracteres',
            'customer_phone.max'=> 'El campo de teléfono del cliente no debe tener más de 20 caracteres',

        ];
    }
}
