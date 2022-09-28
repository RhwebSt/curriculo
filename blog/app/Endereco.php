<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'escep', 'eslogradouro', 'esbairro', 'esestado', 'esmunicipio', 'escodmunic', 'esuf', 'escomplemento', 'esnum', 'pessoal_id'
    ];
    public function pessoal()
    {
        return $this->belongsTo(Pessoal::class);
    }
    public function cadastro($dados)
    {
        return Endereco::create($dados);
    }
    public function editar($dados,$id)
    {
        return Endereco::where('pessoal_id', $id)
        ->update($dados);
    }
}
