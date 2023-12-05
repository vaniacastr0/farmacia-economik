<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgregarCategoriaRequest extends FormRequest
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
            'nombre' =>'required|min:2|max:30|unique:Categoria_producto,nombre',
        ];
    }

    public function messages():array{
        return [
            'nombre.required'=>'Ingrese un nombre',
            'nombre.min'=>'Ingrese un nombre mas largo',
            'nombre.max'=>'Nombre demasiado largo',
            'nombre.unique'=>'El producto ya existe',
        ];
    }
}
