<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Usuario extends Model
{
    use HasFactory;

    public static $sequence = 'seq_usuario';
    protected $table = "usuario";
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id', 'cod_matricula', 'nome', 'telefone', 'senha', 'ativo', 'setor_id'
    ];

    public function setor(){
        return $this->belongsTo(setor::class, 'setor_id', 'id');
    }

    public static function getLogin($data){
        $cod_matricula = $data['cod_matricula'];
        $senha = crypt($data['senha'], 'a45zzzz2s');

        return self::where('cod_matricula',  $cod_matricula)
        ->where('senha', $senha)
        ->where('ativo', 1)
        ->first();
    }

    public static function getByFilter($dados){
        $query = self::with('setor')->orderBy('nome');
        // if(!empty($dados->matricula)){
        //     $query = $query->where('cod_matricula', $dados->matricula);
        // }
        // if(!empty($dados->nome)){
        //     $query = $query->where('nome', 'LIKE', '%'.Str::upper($dados->nome).'%');
        // }
        // if(!empty($dados->ativo)){
        //     $query = $query->where('ativo', $dados->ativo);
        // }
        // if(!empty($dados->setor_id)){
        //     $query = $query->where('setor_id', $dados->setor_id);
        // }
        return $query->get();
    }
}
