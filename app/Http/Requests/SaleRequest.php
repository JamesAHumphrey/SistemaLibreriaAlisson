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
        //['date','customer_name', 'customer_phone', 
        //'subtotal', 'total', 'discount', 'invoice_number', 'code', 'employee_id'];
        return [
			'date' => ['required','date'],
			'customer_name' => ['required','string'],
			'customer_phone' => ['required','string'],
			'subtotal' => ['required','numeric','min:0.01'],
			'total' => ['required','numeric','min:0.01'],
			'discount' => ['required'],
			'invoice_number' => ['required','string'],
            'code' => ['required','min:1','max:16',Rule::unique('providers')->ignore($this->id)],
			'employee_id' => ['required','integer'],
        ];
    }
}
