<?php
namespace App\Http\Controllers;
//namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([

    'middleware' => 'api',

], function ($router) {

    Route::get('/', function(){
        return response()->json(['message'=> 'BSSI Api', 'status' => 'Connected']);
    });

    Route::fallback(function (){
       return response()->json(['message' => 'Route not found','Connected']);
    });

    Route::post('login', [AuthController::class,'login']);
    Route::post('register', [AuthController::class,'register']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
    Route::get('/cliente', 'App\Http\Controllers\Api\c000007Controller@Show');
    Route::get('/clientes', 'App\Http\Controllers\Api\c000007Controller@index');
    Route::get('/usuarios/{codigo}', 'App\Http\Controllers\Api\c000008Controller@Show');
    Route::apiResource('/clienten', 'App\Http\Controllers\Api\c000007Controller');
    Route::apiResource('/pedido', 'App\Http\Controllers\Api\c000056Controller');
    Route::apiResource('/estoque', 'App\Http\Controllers\Api\c000100Controller');
    Route::apiResource('/produto', 'App\Http\Controllers\Api\c000025Controller');
    Route::apiResource('/TipoPgto', 'App\Http\Controllers\Api\c000014Controller');
    Route::apiResource('/grupo', 'App\Http\Controllers\Api\c000017Controller');
    Route::apiResource('/subgrupo', 'App\Http\Controllers\Api\c000018Controller');
    Route::apiResource('/vendedor', 'App\Http\Controllers\Api\c000008Controller');
    Route::apiResource('/caixa', 'App\Http\Controllers\Api\c000044Controller');
    Route::apiResource('/cob', 'App\Http\Controllers\Api\c000049Controller');
    Route::get('pedidos/{id}', 'App\Http\Controllers\Api\c000056Controller@show');
    Route::get('/caixaPorPeriodo', 'App\Http\Controllers\Api\c000044Controller@registrosPorPeriodo');
    Route::get('/pedidosPorPeriodo', 'App\Http\Controllers\Api\c000056Controller@registrosPorPeriodo');
    Route::get('/cobPorPeriodo', 'App\Http\Controllers\Api\c000049Controller@cobPorPeriodo');
    Route::get('/cobcv', 'App\Http\Controllers\Api\c000049Controller@registrosPorPeriodo');

});
