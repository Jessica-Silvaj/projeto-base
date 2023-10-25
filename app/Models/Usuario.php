<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected static $sequence = 'seq_usuario';
    protected $table = "usuario";
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id', 'cod_matricula', 'nome', 'telefone', 'senha', 'ativo'
    ];

    public function usuario_setor(){
        return $this->belongsToMany(usuario_setor::class);
    }

    public static function getLogin($data){
        $cod_matricula = $data['cod_matricula'];
        $senha = md5($data['senha']);

        return self::where('cod_matricula',  $cod_matricula)
        ->where('senha', $senha)
        ->where('ativo', 1)
        ->first();
    }
}
