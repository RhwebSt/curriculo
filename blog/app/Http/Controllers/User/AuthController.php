<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Login\Validacao;
use App\Http\Requests\Login\Senha;
use App\Notifications\EsquecirSenha;
use App\User;
class AuthController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->user = new User;
    }
    public function login(Validacao $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 120
        ]);
    }
    public function esquecirsenha(Senha $request)
    {
        $dados = $request->all();
        try {
            $dados['password'] = rand(100000, 999999);
            $user = $this->user->where('email',$dados['email'])->first();
            $this->user->where('id', $user->id)
            ->update([
                'password' => Hash::make($dados['password']),
            ]);
            $user->notify(new EsquecirSenha($user,$dados['password']));
            return response()->json('Sua senha foi alterada, verifique seu email.');
            
        } catch (\Throwable $th) {
            return response()->json('Não foi porssivél altera sua senha.',401);
        }
    }
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
