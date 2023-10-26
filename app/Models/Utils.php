<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Utils extends Model
{
    public static function addMessage($titulo, $mensagem, $tipo){

        $mensagens = Session::get('mensagens', []);
        $novaMensagem = [
            'titulo' => $titulo,
            'mensagem' => $mensagem,
            'tipo' => $tipo
        ];

        array_push($mensagens, $novaMensagem);

        Session::flash('mensagens', $mensagens);

    }
}
