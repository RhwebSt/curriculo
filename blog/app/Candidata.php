<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidata extends Model
{
    protected $fillable = [
        'user_id', 'vaga_id'
    ];
    public function cadastro($dados)
    {
        return Candidata::create($dados);
    }
    public function editar($dados,$id)
    {
       
        return Candidata::where('id', $id)
        ->update($dados);
    }
}
