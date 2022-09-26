<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidade extends Model
{
    protected $fillable = [
        'hshabilidade', 'academico_id'
    ];
    public function academico()
    {
        return $this->belongsTo(Academico::class);
    }
    public function cadastro($dados)
    {
        return Habilidade::create($dados);
    }
    public function editar($dados,$id)
    {
       
        return Habilidade::where('academico_id', $id)
        ->update($dados);
    }
}
