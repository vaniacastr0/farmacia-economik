<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizacionRequest extends FormRequest
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
            'nombre' =>'required|min:2|max:30',
            'precio' =>'required|min:1|max:11111111111|numeric',
            'categoria' =>'required',
        ];
    }

    public function messages():array{
        return [
            'nombre.required'=>'Ingrese un nombre',
            'nombre.min'=>'Ingrese un nombre mas largo',
            'nombre.max'=>'Nombre demasiado largo',

            'precio.required'=>'Ingrese un precio',
            'precio.min'=>'Ingrese un monto de al menos 3 digitos',
            'precio.max'=>'Monto demasiado alto',
            'precio.numeric'=>'Ingrese un numero',

            'categoria.required'=>'Seleccione un categoria',
        ];
    }
}
