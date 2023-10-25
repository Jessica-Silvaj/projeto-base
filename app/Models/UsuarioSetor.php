<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioSetor extends Model
{
    use HasFactory;

    protected static $sequence = 'seq_usuario_setor';
    protected $table = "usuario_setor";
    protected $primaryKey = ['usuario_id', 'setor_id'];
    public $timestamps = false;

    protected $fillable = [
        'usuario_id', 'setor_id', 'principal'
    ];

    public function usuario(){
        return $this->belongsToMany(Usuario::class, 'usuario_id');
    }

    public function setor(){
        return $this->belongsToMany(Setor::class, 'setor_id');
    }

    public static function getMainSector($usuario_id){
        return self::where('usuario_id', $usuario_id)
        ->where('principal', 1)
        ->first();
    }

    public static function getSecondarySector($usuario_id){
        return self::where('usuario_id', $usuario_id)
        ->where('principal', 0)
        ->first();
    }
}
