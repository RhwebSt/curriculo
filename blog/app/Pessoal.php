<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoal extends Model
{
    protected $fillable = [
        'pstitulopro', 'psnascimento', 'pstelefone', 'pssobrevoce', 'psfoto', 'user_id'
    ];
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
