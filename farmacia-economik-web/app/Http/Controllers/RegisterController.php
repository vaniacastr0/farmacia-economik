<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Usuario;
use App\Models\Vendedor;
use App\Models\Bodeguero;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/inicio');
        }
        return view('auth.register');
    }

    public function register(RegisterRequest $request){

        $rut = $request->input('rut');

        if(!$this->ValidarRut($rut)){
            return redirect()->back()->withErrors('Rut incorrecto')->withInput();

        }

        $usuario = Usuario::create($request->validated());

            if ($request->tipo_usuario === 'V') {
                Vendedor::create([
                    'rut' => $usuario->rut,
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'password' => $request->input('password'), 
                    'tipo_usuario' => 'V',
                ]);
            } elseif ($request->tipo_usuario === 'B') {
                Bodeguero::create([
                    'rut' => $usuario->rut,
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'password' => $request->input('password'), 
                    'tipo_usuario' => 'B',
                ]);
            }
    
            return redirect('/');
        
    }

    public function ValidarRut($rut){

        $numero = substr($rut, 0, -1);
        $digitoV = substr($rut, -1);

        $invertido = strrev($numero);

        $sum = 0;
        $mul = 2;

        for($i = 0;$i < strlen($invertido); $i++){
            $digito = $invertido[$i];
            $sum += $digito * $mul;

            $mul ++;

            if($mul > 7){
                $mul = 2;
            }
        }

        $v = 11 - ($sum % 11);

        if($v == 11){
            $v = 0;
        }elseif($v == 10){
            $v = "k";
        }

        return $v== $digitoV;

    }
    
}
