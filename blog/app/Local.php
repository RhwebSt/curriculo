<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $fillable = [
        'islocal', 'isidioma', 'isnivel', 'isdatainicio', 'isdatafinal', 'academico_id'
    ];
    public function academico()
    {
        return $this->belongsTo(Academico::class);
    }
    public function cadastro($dados)
    {
        return Local::create($dados);
    }
    public function editar($dados,$id)
    {
       
        return Local::where('academico_id', $id)
        ->update($dados);
    }
}
