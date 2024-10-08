<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
			'name' => ['required','string','min:3','max:50'],
			'surname' => ['required','string','min:3','max:50'],
			'code' => ['required', 'string', 'min:1', 'max:16', Rule::unique('employees')->ignore($this->route('employee'))],
			'gender' => ['required','string','max:1'],
			
        ];
    }
    public function messages():array{
        return[
            //mensajes del campo name
            'name.required' => 'El campo nombres es requerido',
            'name.string' => 'El tipo de dato ingresado en el campo nombres no es valido',
            'name.min'=> 'El campo de nombres debe tener al menos 1 caracteres',
            'name.max'=> 'El campo de nombres no debe tener más de 50 caracteres',
            //mensajes del campo surname
            'surname.required' => 'El campo apellidos es requerido',
            'surname.string' => 'El tipo de dato ingresado en el campo apellidos no es valido',
            'surname.min'=> 'El campo de apellidos debe tener al menos 1 caracteres',
            'surname.max'=> 'El campo de apellidos no debe tener más de 50 caracteres',
            //mensajes del campo code
            'code.required' => 'El código es un campo requerido',
            'code.string' => 'El tipo de dato no es valido para el campo código',
            'code.min'=> 'El campo código debe tener al menos 1 caracteres',
            'code.max'=> 'El campo código no debe tener más de 16 caracteres',
            'code.unique' => 'Ya existe un registro con el código indicado',
            //mensajes del campo género
            'gender.required' => 'El género es un campo requerido',
            'gender.string' => 'El tipo de dato no es valido para el campo género',
            'gender.max'=> 'El campo género no debe tener más de 1 caracter',
        ];
    }

}
