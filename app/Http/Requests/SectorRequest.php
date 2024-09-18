<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectorRequest extends FormRequest
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
            'description' => ['required','string','min:3','max:500'],
            'code' => ['required','string','min:1','max:20','unique:sectors,code,except,id'],
            'center_id' => ['required','integer']
        ];

    }
    public function messages(): array{
        return [
            //name
            'name.required' => 'Nombre es un campo requerido',
            'name.string' => 'El tipo de dato no es valido para el campo nombre',
            'name.min'=> 'El campo de nombre debe tener al menos 3 caracteres',
            'name.max'=> 'El campo de nombre no debe tener más de 50 caracteres',
            //description
            'description.required' => 'Nombre es un campo requerido',
            'description.string' => 'El tipo de dato no es valido para el campo nombre',
            'description.min'=> 'El campo de nombre debe tener al menos 3 caracteres',
            'description.max'=> 'El campo de nombre no debe tener más de 500 caracteres',
            //code
            'code.required' => 'El código es un campo requerido',
            'code.string' => 'El tipo de dato no es valido para el campo código',
            'code.min'=> 'El campo código debe tener al menos 3 caracteres',
            'code.max'=> 'El campo código no debe tener más de 20 caracteres',
            'code.unique' => 'Ya existe un registro con el código indicado',
            //career_id
            'center_id.required' => 'Centro es un campo requerido',
            'center_id.integer' => 'El tipo de dato no es valido para el campo centro'
        ];
    }
}
