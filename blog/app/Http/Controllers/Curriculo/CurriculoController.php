<?php

namespace App\Http\Controllers\Curriculo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Curriculo\Validacao;
use App\Pessoal;
use App\User;
use App\Academico;
use App\Endereco;
use App\Profissional;
use App\Habilidade;
use App\Local;
use PDF;
use DataTables;
class CurriculoController extends Controller
{
    private $pessoal,$user,$academico,$endereco,$profissional,$habilidade,$local;
    public function __construct()
    {
        $this->pessoal = new Pessoal;
        $this->user = new User;
        $this->academico = new Academico;
        $this->endereco = new Endereco;
        $this->profissional = new Profissional;
        $this->habilidade = new Habilidade;
        $this->local = new Local;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search');
        $user =  $this->user
        // ->with(['pessoal.endereco','pessoal.academico'])
        ->where('name','like','%'.$search.'%')
        ->get();
        return DataTables::of($user)
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
    
        
            $user = $this->user->cadastro($dados);
            $dados['user_id'] = $user['id'];
            $pessoal = $this->pessoal->cadastro($dados);
            $dados['pessoal_id'] = $pessoal['id'];
            $this->endereco->cadastro($dados);
            $academico = $this->academico->cadastro($dados);
            $academico['academico_id'] = $academico['id'];
            $this->profissional->cadastro($dados);
            $this->local->cadastro($dados);
            $this->habilidade->cadastro($dados);
            return response()->json('Cadastro realizado com sucesso');
            try {
        } catch (\Throwable $th) {
            $this->user->where('id',$user['id'])->delete();
            return response()->json('Não foi possível realizar o cadastro.',401);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pdf = PDF::loadView('teste');
        return $pdf->setPaper('a4')->stream('relatoria.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
