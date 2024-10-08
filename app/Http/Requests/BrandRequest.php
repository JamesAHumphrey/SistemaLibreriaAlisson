<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
			'name' => ['required','string','min:1','max:50'],
        ];
    }
    public function messages():array{
        return[
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El tipo de dato ingresado en el campo nombre no es valido',
            'name.min'=> 'El campo de nombre debe tener al menos 1 caracteres',
            'name.max'=> 'El campo de nombre no debe tener más de 50 caracteres',
        ];
    }
}
