<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CenterRequest extends FormRequest
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
            'name' => ['required','string','min:3','max:50',],
            'code' => ['required','string','min:1','max:20','unique:centers,code,except,id'],
            'address' => ['required','string','min:3','max:500'],
            'city' => ['required','string','min:3','max:50'],
        ];
    }
    public function messages(): array{
        return [
            //name
            'name.required' => 'Nombre es un campo requerido',
            'name.string' => 'El tipo de dato no es valido para el campo nombre',
            'name.min'=> 'El campo de nombre debe tener al menos 3 caracteres',
            'name.max'=> 'El campo de nombre no debe tener más de 50 caracteres',
            //address
            'address.required' => 'Nombre es un campo requerido',
            'address.string' => 'El tipo de dato no es valido para el campo nombre',
            'address.min'=> 'El campo de nombre debe tener al menos 3 caracteres',
            'address.max'=> 'El campo de nombre no debe tener más de 500 caracteres',
            //code
            'code.required' => 'El código es un campo requerido',
            'code.string' => 'El tipo de dato no es valido para el campo código',
            'code.min'=> 'El campo código debe tener al menos 3 caracteres',
            'code.max'=> 'El campo código no debe tener más de 20 caracteres',
            'code.unique' => 'Ya existe un registro con el código indicado',
            //city
            'city.required' => 'Ciudad es un campo requerido',
            'city.string' => 'El tipo de dato no es valido para el campo Ciudad',
            'city.min'=> 'El campo de Ciudad debe tener al menos 3 caracteres',
            'city.max'=> 'El campo de Ciudad no debe tener más de 50 caracteres',
            

        ];
    }
}
