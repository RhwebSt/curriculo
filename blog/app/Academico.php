<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academico extends Model
{
    protected $fillable = [
        'aslocal', 'ascurso', 'asdatainicio', 'asdataconclusao', 'pessoal_id'
    ];
    public function cadastro($dados)
    {
        return Academico::create($dados);
    }
    public function editar($dados,$id)
    {
       
        return Academico::where('pessoals_id', $id)
        ->update($dados);
    }
}
