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
        $data = $request->validated();

        switch($request->input('tipo_usuario')){
            case 'A':
                $data['tipo_usuario'] = 'A';
                break; 
            case 'B' :
                $data['tipo_usuario'] = 'B';
                break;
            case  'V':
                $data['tipo_usuario'] = 'V';  
                break;   
        }

        $usuario = Usuario::create($data);
    
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
