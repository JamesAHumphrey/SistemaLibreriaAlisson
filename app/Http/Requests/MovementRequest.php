<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
			'observation' => 'string',
			'amount' => 'required',
			'unit_value' => 'required',
			'total_value' => 'required',
			'date' => 'required',
			'unit_value_balance' => 'required',
			'total_balance' => 'required',
			'amount_balance' => 'required',
			'code' => 'required|string',
			'product_id' => 'required',
			'type_id' => 'required',
			'employee_id' => 'required',
        ];
    }
}
