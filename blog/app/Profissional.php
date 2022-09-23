<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    protected $fillable = [
        'psempresa', 'pscargo', 'psexperiencia', 'psdatainicio', 'psdatafinal', 'academico_id'
    ];
    public function cadastro($dados)
    {
        return Profissional::create($dados);
    }
    public function editar($dados,$id)
    {
       
        return Profissional::where('academico_id', $id)
        ->update($dados);
    }
}
