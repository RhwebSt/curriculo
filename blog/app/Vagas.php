<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vagas extends Model
{
    protected $fillable = [
        'vsempresa', 'vstitulo', 'viquantidade', 'vsdescricao', 'vsdatafinal', 'vscidade', 'vsuf', 'vivalor', 'vstipo'
    ];
    public function cadastro($dados)
    {
        return Vagas::create($dados);
    }
    public function editar($dados,$id)
    {
        return Vagas::where('id', $id)
        ->update($dados);
    }
}
