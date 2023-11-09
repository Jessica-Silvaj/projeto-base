<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Usuario;
use App\Models\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function index(Request $request){
        $request->flash();
        $listUsuario = Usuario::getByFilter($request);
        return view('admin.cadastros.usuarios.index', compact('listUsuario'));
    }

    public function edit($id = 0){
        if ($id != 0) {
            $objUsuario = Usuario::findOrFail($id);
        } else{
            $objUsuario = new Usuario();
        }
        $setor = Setor::getAll();
        return view('admin.cadastros.usuarios.edit', compact('id', 'objUsuario', 'setor'));
    }

    public function store(Request $request){
        try {
            $request->flash();
            $msg = '';
            DB::beginTransaction();
            if(empty($request->id)){
                $banco = Usuario::created([
                    'id' => Utils::getSequence(Usuario::$sequence),
                    'cod_matricula' => $request->matricula,
                    'nome' => $request->nome,
                    'telefone' => $request->telefone,
                    'senha' => md5($request->senha),
                    'ativo' => $request->ativo,
                    'setor_id' => $request->setor_id
                ]);
                $msg = "Usuário cadastrado com sucesso!";
            } else{
                $banco = Usuario::find($request->id);
                $banco->update([
                    'cod_matricula' => $request->matricula,
                    'nome' => $request->nome,
                    'telefone' => $request->telefone,
                    'senha' => md5($request->senha),
                    'ativo' => $request->ativo,
                    'setor_id' => $request->setor_id
                ]);
                $msg = "Usuário alterado com sucesso!";
            }
            DB::commit();
            Session::flash('success', $msg);
            return redirect()->route('cadastro.usuario.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
            DB::rollBack();
        }
    }
}
