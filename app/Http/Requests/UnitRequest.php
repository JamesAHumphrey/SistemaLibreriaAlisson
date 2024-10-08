<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
			'description' => ['string','min:1','max:1000']
        ];
    }
    public function messages():array    
    {
        return[
            //mensajes del campo name
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El tipo de dato ingresado en el campo nombre no es valido',
            'name.min'=> 'El campo de nombre debe tener al menos 1 caracteres',
            'name.max'=> 'El campo de nombre no debe tener más de 50 caracteres',
            //mensajes del campo decription
            'description.string' => 'El tipo de dato ingresado en el campo descripción no es valido',
            'description.min'=> 'El campo de descripción debe tener al menos 1 caracteres',
            'description.max'=> 'El campo de descripción no debe tener más de 1000 caracteres',
        ];
    }
}
