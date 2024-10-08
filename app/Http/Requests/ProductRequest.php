<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'current_stock' => $this->input('current_stock') ?? 0,
            'current_total' => $this->input('current_total') ?? 0,
            'current_unit_price' => $this->input('current_unit_price') ?? 0,
            'minimum_stocks' => $this->input('minimum_stocks') ?? 0,
            'initial_inventory' => $this->input('initial_inventory') ? true : 0,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
			'name' => ['required','string','min:1','max:100'],
			'description' => ['string','min:1','max:1000'],
			'retail_price' => ['required','numeric','min:0.01'],
			'wholesale_price' => ['required','numeric','min:0.01'],
			'code' => ['required', 'string', 'min:1', 'max:16', Rule::unique('products')->ignore($this->route('product'))],
			'category_id' => ['required','integer'],
			'unit_id' => ['required','integer'],
            'brand_id' => ['required','integer'],
            'current_stock' => ['required','integer','min:0'],
            'current_total' => ['required','numeric','min:0'],
            'current_unit_price' => ['required','numeric','min:0'],
            'minimum_stocks' => ['required','numeric','min:1'],
            'initial_inventory' => ['required','boolean']
        ];

        return $rules;
    }

    public function messages():array{
        return[
            //mensajes del campo name
            'name.required' => 'El campo nombres es requerido',
            'name.string' => 'El tipo de dato ingresado en el campo nombres no es valido',
            'name.min'=> 'El campo de nombres debe tener al menos 1 caracteres',
            'name.max'=> 'El campo de nombres no debe tener más de 50 caracteres',
            //mensajes del campo description
            'description.string' => 'El tipo de dato ingresado en el campo descripción no es valido',
            'description.min'=> 'El campo de descripción debe tener al menos 1 caracteres',
            'description.max'=> 'El campo de descripción no debe tener más de 1000 caracteres',
            //mensajes del campo unit_value
            'retail_price.required' => 'El campo precio al detalle es requerido',
            'retail_price.numeric' => 'El tipo de dato ingresado en el campo precio al detalle no es valido',
            'retail_price.min'=> 'El campo de precio al detalle no puede ser menor que 0.01',
            //mensajes del campo unit_value
            'wholesale_price.required' => 'El campo precio al por mayor es requerido',
            'wholesale_price.numeric' => 'El tipo de dato ingresado en el campo precio al por mayor no es valido',
            'wholesale_price.min'=> 'El campo de precio al por mayor no puede ser menor que 0.01',
            //mensajes del campo code
            'code.required' => 'El código es un campo requerido',
            'code.string' => 'El tipo de dato no es valido para el campo código',
            'code.min'=> 'El campo código debe tener al menos 1 caracteres',
            'code.max'=> 'El campo código no debe tener más de 16 caracteres',
            'code.unique' => 'Ya existe un registro con el código indicado',
            //mensajes del campo category_id
            'category_id.required' => 'Categoría es un campo requerido',
            'category_id.integer' => 'El tipo de dato no es valido para el campo categoría',
            //mensajes del campo unit_id
            'unit_id.required' => 'Unidad es un campo requerido',
            'unit_id.integer' => 'El tipo de dato no es valido para el campo unidad',
            //mensajes del campo brand_id
            'brand_id.required' => 'Marca es un campo requerido',
            'brand_id.integer' => 'El tipo de dato no es valido para el campo marca',
            // //mensajes del campo current_stock
            // 'current_stock.required' => 'El campo existencias es requerido',
            // 'current_stock.numeric' => 'El tipo de dato ingresado en el campo existencias no es valido',
            // 'current_stock.min'=> 'El campo de existencias no puede ser menor que 1',
            // //mensajes del campo current_total
            // 'current_total.required' => 'El campo total al detalle es requerido',
            // 'current_total.numeric' => 'El tipo de dato ingresado en el campo total al detalle no es valido',
            // 'current_total.min'=> 'El campo de total al detalle no puede ser menor que 0.01',
            // //mensajes del campo current_unit_price
            // 'current_unit_price.required' => 'El campo precio unitario es requerido',
            // 'current_unit_price.numeric' => 'El tipo de dato ingresado en el campo precio unitario no es valido',
            // 'current_unit_price.min'=> 'El campo de precio unitario no puede ser menor que 0.01',
            //mensajes del campo minimum_stocks
            'minimum_stocks.required' => 'El campo existencias mínimas es requerido',
            'minimum_stocks.numeric' => 'El tipo de dato ingresado en el campo existencias mínimas no es valido',
            'minimum_stocks.min'=> 'El campo de existencias mínimas no puede ser menor que 1',
            //mensajes del campo initial_inventory
            'initial_inventory.required' => 'El campo inventario inicial es requerido',
            'initial_inventory.boolean' => 'El tipo de dato ingresado en el campo inventario inicial no es valido',
        ];
    }
}
