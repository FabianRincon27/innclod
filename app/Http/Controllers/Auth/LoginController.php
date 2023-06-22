<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator, Auth, Hash;

class LoginController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'El correo electrónico no puede estar vacio.',
            'password.required' => 'La contraseña no puede estar vacia.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return back()->with('message', 'Por favor ingrese los datos solicitados en el formulario')
                    ->with('icon', 'error');
        } else {
            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)){
                return redirect()->route('dashboard');
            } else {
                return back()->with('message', 'El correo electrónico o la contraseña son incorrectos, por favor verifiquelo e intente nuevamente')
                    ->with('icon', 'error');
            }
        }
    }
}
