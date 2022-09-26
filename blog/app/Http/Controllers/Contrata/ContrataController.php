<?php

namespace App\Http\Controllers\Contrata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\ContrataMobe;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Contrata\Validacao;

class ContrataController extends Controller
{
    private $notificacao;
    public function __construct()
    {
        $this->notificacao = new Notification;
    }
    public function store(Validacao $request)
    {
        $dados = $request->all();
        try {
            Notification::route('mail', 'ruambaia065@gmail.com')
            ->notify(new ContrataMobe($dados));
            return response()->json('Menssagem enviada com sucesso.');
        } catch (\Throwable $th) {
             return response()->json('Não foi porssivél envia sua mensagem.',401);
        }
       
    }
}
