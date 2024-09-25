<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
			'name' => 'required|string',
			'description' => 'string',
			'retail_price' => 'required|numeric|min:0',
			'wholesale_price' => 'required|numeric|min:0',
			'code' => 'required|string',
			'category_id' => 'required',
			'unit_id' => 'required',
            'brand_id' => 'required',
            'current_stock' => 'required|numeric|min:0',
            'current_total' => 'required|numeric|min:0',
            'current_unit_price' => 'required|numeric|min:0',
            'minimum_stocks' => 'required|numeric|min:0',
            'initial_inventory' => 'required'
        ];

        return $rules;
    }
}
