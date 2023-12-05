<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarDetalleProductoRequest extends FormRequest
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
            'cantidad' => 'required|min:1|max:11111111111|numeric', 
            'elab' => 'required|date',
            'venc' => 'required|date',   
        ];
    }
    public function messages():array{
        return [
            'cantidad.required'=>'Ingrese un precio',
            'cantidad.min'=>'Ingrese un monto de al menos 3 digitos',
            'cantidad.max'=>'Monto demasiado alto',
            'cantidad.numeric'=>'Ingrese un número',

            'elab.required' => 'Ingrese una fecha de elaboración',

            'venc.required' => 'Ingrese una fecha de vencimiento',

        ];
    }
}
