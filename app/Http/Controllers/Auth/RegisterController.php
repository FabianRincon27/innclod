<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function getRegister(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ];

        $messages = [
            'name.required' => 'El nombre es un campo requerido.',
            'email.required' => 'El correo electrónico es un campo requerido.',
            'email.email' => 'El formato de su correo electrónico es invalido.',
            'email.unique' => 'Ya existe un usuario asociado a ese correo electrónico.',
            'password.required' => 'La contraseña es un campo requerido.',
            'password.min' => 'La contraseña debe tener 8 caracteres como mínimo.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):
            return back()->with('message', 'No se ha podido realizar el registro, por favor, valida los campos e intenta nuevamente:')->with('typealert', 'danger');
        else:
            $user = new User;
            $user->name = e($request->input('name'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));

            if($user->save()):
                return redirect('/')->with('message', 'Usuario creado correctamente, ya puedes ingresar al sistema')->with('color', 'bg-success');
            else:
            endif;
        endif;

    }
}
