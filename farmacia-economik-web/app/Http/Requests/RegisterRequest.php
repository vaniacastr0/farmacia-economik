<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class RegisterRequest extends FormRequest
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
            'tipo_usuario'=>'required',
            'nombre' =>'required|alpha|min:3|max:20|',
            'apellido' =>'required|alpha|min:3|max:20|',
            'rut' =>'required|min:9|max:10|regex:/^[Kk0-9]+$/|unique:Usuarios,rut',
            'password' =>'required|string|min:4|max:20',
        ];
    }
    public function messages():array{
        return [
            'tipo_usuario.required' => 'Seleccione el tipo de usuario',

            'nombre.required' => 'Ingrese un nombre',
            'nombre.alpha' => 'El nombre solo debe contener letras',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El nombre es demasiado largo',

            'apellido.required' => 'Ingrese apellido',
            'apellido.alpha' => 'El apellido solo debe contener letras',
            'apellido.min' => 'El apellidodebe tener al menos 3 caracteres',
            'apellido.max' => 'El apellido es demasiado largo',

            'rut.required' => 'Ingrese un rut',
            'rut.min' => 'Ingrese un rut valido',
            'rut.max' => 'Ingrese un rut valido',
            'rut.regex' => 'El rut solo debe contener numeros',
            'rut.unique' => 'El rut ya existe',
            
            'password.required'=> 'Ingrese una con contraseña',
            'password.string'=> 'Ingrese una con contraseña solo debe tener letras',
            'password.min'=> 'La contraseña debe tener entre 4 y 20 caracteres',
            'password.max'=> 'La contraseña debe tener entre 4 y 20 caracteres',
        ];
    }
}
