<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class LoginController extends Controller
{
    

    public function show(){
        if(Auth::check()){
            return redirect('/inicio');
        }
        return view('login.login');
    }
    
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('rut', 'password');

        if (!Auth::attempt($credentials)) {
            return redirect()->to('/')->withErrors('Nombre de usuario o contraseña incorrrectas')->withInput();
        }

        return $this->authenticated($request, Auth::user());
    }

    public function authenticated(LoginRequest $request, Usuario $Usuario)
    {
        return redirect('/inicio');
    }
}
