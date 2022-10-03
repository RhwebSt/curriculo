<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware'=>['apiJwt']],function(){
    Route::get('user','User\\UserController@index');
    Route::get('curriculo/lista','Curriculo\\CurriculoController@index');
    Route::get('user/logout', 'User\\AuthController@logout');
    
});
Route::post('curriculo/cadastro','Curriculo\\CurriculoController@store');
Route::post('user/login', 'User\\AuthController@login');

Route::post('login/esquecir/senha', 'User\\AuthController@esquecirsenha');
Route::post('contrata/mobe','Contrata\\ContrataController@store');

