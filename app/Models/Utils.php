<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

    public static function telefone($n){
        $tam = strlen(preg_replace("/[^0-9]/", "-", $n));

        // if ($tam == 13) {
        //     // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
        //     return "+".substr($n, 0, $tam-11)." (".substr($n, $tam-11, 2).") ".substr($n, $tam-9, 5)."-".substr($n, -4);
        // }
        // if ($tam == 12) {
        //     // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
        //     return "+".substr($n, 0, $tam-10)." (".substr($n, $tam-10, 2).") ".substr($n, $tam-8, 4)."-".substr($n, -4);
        // }
        // if ($tam == 11) {
        //     // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
        //     return " (".substr($n, 0, 2).") ".substr($n, 2, 5)."-".substr($n, 7, 11);
        // }
        // if ($tam == 10) {
        //     // COM CÓDIGO DE ÁREA NACIONAL
        //     return " (".substr($n, 0, 2).") ".substr($n, 2, 4)."-".substr($n, 6, 10);
        // }
        // if ($tam <= 9) {
        //     // SEM CÓDIGO DE ÁREA
        //     return substr($n, 0, $tam-4)."-".substr($n, -4);
        // }

        if ($tam == 6) {
            // SEM CÓDIGO DE ÁREA
            return substr($n, 0, $tam-3)."-".substr($n, -3);
        }
    }

    public static function getSequence($seq){
        $sql = "SELECT ".$seq.".nextval seq from dual";
        return DB::select($seq)[0]->seq;
    }
}

