<?php

namespace App\Http\Controllers\Curriculo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Curriculo\Validacao;
use Illuminate\Support\Facades\DB;
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
        ->join('pessoals', 'users.id', '=', 'pessoals.user_id')
        ->join('enderecos', 'pessoals.id', '=', 'enderecos.pessoal_id')
        ->select('users.name','pessoals.user_id','pessoals.pssexo','pessoals.pstitulopro','pessoals.psnascimento','pessoals.pstelefone','enderecos.*')
        ->where('users.name','like','%'.$search.'%')
        ->orWhere('pessoals.psnascimento','like','%'.$search.'%')
        ->orWhere('pessoals.pstelefone','like','%'.$search.'%')
        ->orWhere('enderecos.esbairro','like','%'.$search.'%')
        ->orWhere('enderecos.esestado','like','%'.$search.'%')
        ->orWhere('enderecos.esmunicipio','like','%'.$search.'%')
        ->orderBy('created_at', 'desc');
        // ->get();
        // return response()->json($user);
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
    public function store(Validacao $request)
    {
        $dados = $request->all();
        $user = $this->user->cadastro($dados);
        try {
           
            $dados['user_id'] = $user['id'];
            $pessoal = $this->pessoal->cadastro($dados);
            $dados['pessoal_id'] = $pessoal['id'];
            $this->endereco->cadastro($dados);
            $academico = $this->academico->cadastro($dados);
            $dados['academico_id'] = $academico['id'];
            $this->profissional->cadastro($dados);
            // $this->local->cadastro($dados);
            // $this->habilidade->cadastro($dados);
            return response()->json('Cadastro realizado com sucesso');
           
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
        $user =  $this->user->where('id',$id)
        ->with('pessoal')
        ->first();
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline;');
        echo file_get_contents($user->pessoal[0]->psfoto);
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
