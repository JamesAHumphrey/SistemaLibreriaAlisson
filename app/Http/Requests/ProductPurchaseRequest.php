<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPurchaseRequest extends FormRequest
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
			'purchase_price' => ['required','numeric','min:0.01'],
			'amount' => ['required','integer','min:1'],
			'total' => ['required','numeric','min:0.01'],
			'product_id' => ['required','integer'],
			'purchase_id' => ['required','integer'],
        ];
    }
    public function messages():array{
        return[
            //mensajes del campo purchase_price
            'purchase_price.required' => 'El campo precio de compra es requerido',
            'purchase_price.numeric' => 'El tipo de dato ingresado en el campo precio de compra no es valido',
            'purchase_price.min'=> 'El campo de precio de compra no puede ser menor que 0.01',
            //mensajes del campo amount
            'amount.required' => 'El campo cantidad es requerido',
            'amount.integer' => 'El tipo de dato ingresado en el campo cantidad no es valido',
            'amount.min'=> 'El campo de cantidad no puede ser menor que 1',
            //mensajes del campo total
            'total.required' => 'El campo total es requerido',
            'total.numeric' => 'El tipo de dato ingresado en el campo total no es valido',
            'total.min'=> 'El campo de total no puede ser menor que 0.01',
            //mensajes del campo product_id
            'product_id.required' => 'Producto es un campo requerido',
            'product_id.integer' => 'El tipo de dato no es valido para el campo producto',
            //mensajes del campo purchase_id
            'purchase_id.required' => 'Identificador de compra es un campo requerido',
            'purchase_id.integer' => 'El tipo de dato no es valido para el campo Identificador de compra',

        ];
    }
}
