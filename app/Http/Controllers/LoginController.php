<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

use App\Models\Usuario;
use App\Models\UsuarioSetor;
use Illuminate\Validation\ValidationException;

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

        if(empty($user)){
            $msg = "Matricula ou senha Inválidos!";
            return redirect()->route('login.index')->with('error', $msg);
        } else {

            $mainSector = UsuarioSetor::getMainSector($user->id);
            $secondarySector = UsuarioSetor::getSecondarySector($user->id);

            session()->flush();
            session([
                'usuarioId' => $user->id,
                'nome' => $user->nome,
                'cod_matricula' =>$user->cod_matricula,
                'setorPrincipal' => $mainSector ?  $mainSector : null,
                'setorSecundario' => $secondarySector ? $secondarySector : null,
            ]);

            return view('welcome');
        }

    }

    public function logout(){
        Session()->flush();
        Auth()->logout();
        return Redirect()->route('login.index');
    }

}
