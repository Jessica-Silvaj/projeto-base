<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    public function index(){
        $usuario = Usuario::where('ativo', 1)->count();
        return view('admin.painelControle.index', compact('usuario'));
    }
}
