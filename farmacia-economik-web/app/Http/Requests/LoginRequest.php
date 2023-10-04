<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'rut' =>'required|min:9|max:10|regex:/^[Kk0-9]+$/',
            'password' =>'required|string|min:4|max:20',

        ];
    }

    public function messages():array{
        return [

            'rut.required' => 'Ingrese un rut',
            'rut.min' => 'Ingrese un rut valido',
            'rut.max' => 'Ingrese un rut valido',
            'rut.numeric' => 'Ingrese un rut valido',
            'rut.regex' => 'El rut solo debe contener numeros',
            

            'password.required'=> 'Ingrese una contraseña',
            'password.string'=> 'Ingrese una con contraseña solo debe tener letras',
            'password.min'=> 'La contraseña debe tener entre 4 y 20 caracteres',
            'password.max'=> 'La contraseña debe tener entre 4 y 20 caracteres',
                    
        ];

    }
}
