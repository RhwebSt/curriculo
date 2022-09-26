<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academico extends Model
{
    protected $fillable = [
        'aslocal', 'ascurso', 'asdatainicio', 'asdataconclusao', 'pessoal_id'
    ];
    public function pessoal()
    {
        return $this->belongsTo(Pessoal::class);
    }
    public function local()
    {
        return $this->hasMany(Local::class);
    }
    public function profissional()
    {
        return $this->hasMany(Profissional::class);
    }
    public function habilidade()
    {
        return $this->hasMany(Habilidade::class);
    }
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
