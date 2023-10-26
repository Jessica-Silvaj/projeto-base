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
        'id', 'cod_matricula', 'nome', 'telefone', 'senha', 'ativo', 'setor_id'
    ];

    public function setor(){
        return $this->belongsToMany(setor::class, 'setor_id', 'id');
    }

    public static function getLogin($data){
        $cod_matricula = $data['cod_matricula'];
        $senha = crypt($data['senha'], 'a45zzzz2s');

        return self::where('cod_matricula',  $cod_matricula)
        ->where('senha', $senha)
        ->where('ativo', 1)
        ->first();
    }
}
