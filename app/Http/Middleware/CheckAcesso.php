<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckAcesso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public const PERFIL_ADMIM = 1;
    public const PERFIL_GERENTE = 2;

    public const listRoutes = array (
        // Painel Principal
        'painel.index' => array(self::PERFIL_ADMIM, self::PERFIL_GERENTE),
    );

    public function temAcesso($routeName){

        if(empty(session('cod_matricula'))){
            return false;
        }

        $routeName = Route::current()->getName();

        if(!isset(self::listRoutes[$routeName])){
            return false;
        }

        $listPerfis = self::listRoutes[$routeName];
        if(!in_array(session('setorPrincipal'), $listPerfis) && !in_array(session('setorSecundario'), $listPerfis)){
            return false;
        }

        return true;
    }

    public function handle(Request $request, Closure $next){
        //TODO
        if(empty(session('cod_matricula'))){
            return redirect()->route('login.index')->with('error', 'Sessão expirada. Efetue o login para continuar!');
        }

        $routeName = Route::current()->getName();

        if(!isset(self::listRoutes[$routeName])){
            return redirect()->route('painel.index')->with('error', 'Problema de configuração do sistema (Rota: '. $routeName .' sem configuração), entre em contato com o administrador!');
        }

        $listPerfis = self::listRoutes[$routeName];
        if(!in_array(session('setorPrincipal'), $listPerfis)){
            return redirect()->route('painel.index')->with('error', 'Acesso negado!');
        }

        return $next($request);
    }
}
