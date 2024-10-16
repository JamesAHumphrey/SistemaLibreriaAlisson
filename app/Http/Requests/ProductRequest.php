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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'name' => 'required|string',
			'description' => 'string',
			'retail_price' => 'required',
			'wholesale_price' => 'required',
			'current_stock' => 'required',
			'current_total' => 'required',
			'current_unit_price' => 'required',
			'minimum_stocks' => 'required',
			'code' => 'required|string',
			'category_id' => 'required',
			'unit_id' => 'required',
            'brand_id' => 'required'
        ];
    }
}
