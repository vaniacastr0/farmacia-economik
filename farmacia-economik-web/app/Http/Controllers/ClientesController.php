<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientesRequest;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    public function clientes_agregar_post(ClientesRequest $request){
        $rut = $request->input('rut');
        if(!$this->ValidarRut($rut)){
            return redirect()->back()->withErrors('Rut incorrecto')->withInput();
        }
        $data = $request->validated();
        $cliente = Cliente::create($data);


        $clientesConCompras = DB::table('clientes')
        ->leftJoin('ventas', 'clientes.rut', '=', 'ventas.rut_cliente')
        ->select(
            'clientes.rut',
            'clientes.nombre',
            'clientes.apellido',
            DB::raw('COUNT(ventas.rut_cliente) as cantidad_compras')
        )
        ->groupBy('clientes.rut', 'clientes.nombre', 'clientes.apellido')
        ->get();

        return view('administrador.clientes_ver',compact('clientesConCompras'));
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
