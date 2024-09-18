<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
			'price' => 'required',
			'amount' => 'required',
			'customer_name' => 'required|string',
			'customer_phone' => 'required|string',
			'subtotal' => 'required',
			'total' => 'required',
			'discount' => 'required',
			'invoice_number' => 'required|string',
			'code' => 'required|string',
			'employee_id' => 'required',
        ];
    }
}
