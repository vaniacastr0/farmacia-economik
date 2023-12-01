<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        ];
    }
}
