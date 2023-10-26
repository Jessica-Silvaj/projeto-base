<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Usuario;
use App\Models\UsuarioSetor;
use App\Models\Utils;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){

        return view('auth.login');
    }

    public function authentication(){

        $crendentials = $this->validate(request(), [
            'cod_matricula' => 'required|integer',
            'senha' => 'required|string',
        ]);

        $userdata = array(
            'cod_matricula' => $crendentials['cod_matricula'],
            'senha' => $crendentials['senha']
        );

        $user = Usuario::getLogin($userdata);


        if(!empty($user)){

            Session::put('usuarioId', $user->id);
            Session::put('nome', $user->nome);
            Session::put('cod_matricula', $user->cod_matricula);
            Session::put('setorPrincipal', $user->setor_id);
            return redirect()->route('painel.index');

        } else {
            //TODO
            return redirect()->back();
        }
    }

    public function logout(Request $request){

        Auth::guard('web')->logout();
        Session::put('usuarioId', '');
        Session::put('nome', '');
        Session::put('cod_matricula', '');
        Session::put('setorPrincipal', '');
        Session::put('setorSecundario', '');

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }

}
