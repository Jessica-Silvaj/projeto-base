<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected static $sequence = 'seq_setor';
    protected $table = "setor";
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id', 'nome',
    ];

    public function usuario_setor(){
        return $this->belongsToMany(usuario_setor::class);
    }

}
