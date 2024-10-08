<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProviderRequest extends FormRequest
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
			'phone' => ['required','string','min:1','max:20'],
			'address' => ['string','min:1','max:1500'],
			'email' => ['string','min:1','max:80'],
			'ruc' => ['required','string','min:1','max:20',Rule::unique('providers')->ignore($this->id)],
        ];
    }
    public function messages():array{
        return[
            //mensajes del campo name
            'name.required' => 'El campo nombres es requerido',
            'name.string' => 'El tipo de dato ingresado en el campo nombres no es valido',
            'name.min'=> 'El campo de nombres debe tener al menos 1 caracteres',
            'name.max'=> 'El campo de nombres no debe tener más de 50 caracteres',
            //mensajes del campo phone
            'phone.required' => 'El campo teléfono es requerido',
            'phone.string' => 'El tipo de dato ingresado en el campo teléfono no es valido',
            'phone.min'=> 'El campo de teléfono debe tener al menos 1 caracteres',
            'phone.max'=> 'El campo de teléfono no debe tener más de 20 caracteres',
            //mensajes del campo address
            'address.string' => 'El tipo de dato ingresado en el campo dirección no es valido',
            'address.min'=> 'El campo de dirección debe tener al menos 1 caracteres',
            'address.max'=> 'El campo de dirección no debe tener más de 1500 caracteres',
            //mensajes del campo email
            'email.string' => 'El tipo de dato ingresado en el campo email no es valido',
            'email.min'=> 'El campo de email debe tener al menos 1 caracteres',
            'email.max'=> 'El campo de email no debe tener más de 50 caracteres',
            //mensajes del campo ruc
            'ruc.required' => 'El RUC es un campo requerido',
            'ruc.string' => 'El tipo de dato no es valido para el campo RUC',
            'ruc.min'=> 'El campo RUC debe tener al menos 1 caracteres',
            'ruc.max'=> 'El campo RUC no debe tener más de 16 caracteres',
            'ruc.unique' => 'Ya existe un registro con el RUC indicado'
        ];
    }
}
