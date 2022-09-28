<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoal extends Model
{
    protected $fillable = [
        'pstitulopro', 'psnascimento', 'pstelefone', 'pssobrevoce','pssexo', 'psfoto', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function endereco()
    {
        return $this->hasMany(Endereco::class);
    }
    public function academico()
    {
        return $this->hasMany(Academico::class);
    }
    public function cadastro($dados)
    {
        return Pessoal::create($dados);
    }
    public function editar($dados,$id)
    {
       
        return Pessoal::where('user_id', $id)
        ->update($dados);
    }
}
