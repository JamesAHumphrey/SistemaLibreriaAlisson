<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'first_name' => ['required','string','min:3','max:50',],
            'middle_name' => ['required','string','min:3','max:50',],
            'first_surname' => ['required','string','min:3','max:50',],
            'second_surname' => ['required','string','min:3','max:50',],
            'phone' => ['required','string','min:8','max:20',],
            'address' => ['required','string','min:3','max:500',],
            'gender' => ['required','string','max:1'],
            'identity_card' => ['required','string','min:3','max:20','unique:students,identity_card,except,id'],
            'code'=> ['required','string','min:3','max:20','unique:students,identity_card,except,id'],
            'career_id' => ['required','integer']
        ];
    }
    public function messages(): array{
        return [
            //first_name
            'first_name.required' => 'El primer nombre es un campo requerido',
            'first_name.string' => 'El tipo de dato no es valido para el campo primer nombre',
            'first_name.min'=> 'El campo de primer nombre debe tener al menos 3 caracteres',
            'first_name.max'=> 'El campo de primer nombre no debe tener más de 50 caracteres',
            //second_name
            'middle_name.required' => 'El primer nombre es un campo requerido',
            'middle_name.string' => 'El tipo de dato no es valido para el campo segundo nombre',
            'middle_name.min'=> 'El campo de segundo nombre debe tener al menos 3 caracteres',
            'middle_name.max'=> 'El campo de segundo nombre no debe tener más de 50 caracteres',
            //first_surname
            'first_surname.required' => 'El primer apellido es un campo requerido',
            'first_surname.string' => 'El tipo de dato no es valido para el campo primer apellido',
            'first_surname.min'=> 'El campo de primer apellido debe tener al menos 3 caracteres',
            'first_surname.max'=> 'El campo de primer apellido no debe tener más de 50 caracteres',
            //second_surname
            'second_surname.required' => 'El segundo apellido es un campo requerido',
            'second_surname.string' => 'El tipo de dato no es valido para el campo segundo apellido',
            'second_surname.min'=> 'El campo de segundo apellido debe tener al menos 3 caracteres',
            'second_surname.max'=> 'El campo de segundo apellido no debe tener más de 50 caracteres',
            //phone
            'phone.required' => 'El número de teléfono es un campo requerido',
            'phone.string' => 'El tipo de dato no es valido para el campo número de teléfono',
            'phone.min'=> 'El campo de número de teléfono debe tener al menos 8 caracteres',
            'phone.max'=> 'El campo de número de teléfono no debe tener más de 20 caracteres',
            //address
            'address.required' => 'La dirección es un campo requerido',
            'address.string' => 'El tipo de dato no es valido para el campo dirección',
            'address.min'=> 'El campo dirección debe tener al menos 3 caracteres',
            'address.max'=> 'El campo dirección no debe tener más de 500 caracteres',
            //gender
            'gender.required' => 'El género es un campo requerido',
            'gender.string' => 'El tipo de dato no es valido para el campo género',
            'gender.max'=> 'El campo género no debe tener más de 1 caracter',
            //identity_card
            'identity_card.required' => 'La cédula es un campo requerido',
            'identity_card.string' => 'El tipo de dato no es valido para el campo cédula',
            'identity_card.min'=> 'El campo cédula debe tener al menos 3 caracteres',
            'identity_card.max'=> 'El campo cédula no debe tener más de 20 caracteres',
            //code
            'code.required' => 'El código es un campo requerido',
            'code.string' => 'El tipo de dato no es valido para el campo código',
            'code.min'=> 'El campo código debe tener al menos 3 caracteres',
            'code.max'=> 'El campo código no debe tener más de 20 caracteres',
            'code.unique' => 'Ya existe un registro con el código indicado',
            //career_id
            'career_id.required' => 'La carrera es un campo requerido',
            'career.integer' => 'El tipo de dato no es valido para el campo carrera'

        ];
    }
}
