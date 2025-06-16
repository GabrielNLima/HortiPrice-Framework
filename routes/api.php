<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\CustoAbcController;
use App\Http\Controllers\Api\CustoAbsorcaoController;
use App\Http\Controllers\Api\CustoController;
use App\Http\Controllers\Api\CustoVariavelController;
use App\Http\Controllers\Api\DirecionadorController;
use App\Http\Controllers\Api\ProdutividadeController;
use App\Http\Controllers\Api\RelatorioAbcController;
use App\Http\Controllers\Api\RelatorioCustoController;
use App\Http\Controllers\Api\RelatorioCustoUnitarioController;
use App\Http\Controllers\Api\RelatorioTotaisCustoController;
use App\Http\Controllers\Api\SubCategoriaController;
use App\Http\Controllers\Api\TipoController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\ComponenteController;

Route::get('/areas', [AreaController::class, 'index']);
Route::get('/areas/{id}', [AreaController::class, 'show']);
Route::post('/areas', [AreaController::class, 'store']);
Route::put('/areas/{id}', [AreaController::class, 'update']);
Route::delete('/areas/{id}', [AreaController::class, 'destroy']);


Route::get('/direcionador', [DirecionadorController::class,'index']);
Route::get('/direcionador/{id}', [DirecionadorController::class, "show"]);
Route::post('/direcionador', [DirecionadorController::class, "store"]);
Route::put('/direcionador/{id}', [DirecionadorController::class,'update']);
Route::delete('/direcionador/{id}', [DirecionadorController::class, 'destroy']);


Route::get('/categoria', [CategoriaController::class,'index']);
Route::get('/categoria/{id}', [CategoriaController::class, "show"]);
Route::post('/categoria', [CategoriaController::class, "store"]);
Route::put('/categoria/{id}', [CategoriaController::class,'update']);
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy']);

Route::get('/sub_categoria', [SubCategoriaController::class,'index']);
Route::get('/sub_categoria/{id}', [SubCategoriaController::class, "show"]);
Route::post('/sub_categoria', [SubCategoriaController::class, "store"]);
Route::put('/sub_categoria/{id}', [SubCategoriaController::class,'update']);
Route::delete('/sub_categoria/{id}', [SubCategoriaController::class, 'destroy']);

Route::get('/tipo', [TipoController::class, 'index']);
Route::get('/tipo/{id}', [TipoController::class, 'show']);
Route::post('/tipo', [TipoController::class, 'store']);
Route::put('/tipo/{id}', [TipoController::class, 'update']);
Route::delete('/tipo/{id}', [TipoController::class, 'destroy']);

Route::get('/produtividade', [ProdutividadeController::class, 'index']);
Route::get('/produtividade/{id}', [ProdutividadeController::class, 'show']);
Route::post('/produtividade', [ProdutividadeController::class, 'store']);
Route::put('/produtividade/{id}', [ProdutividadeController::class, 'update']);
Route::delete('/produtividade/{id}', [ProdutividadeController::class, 'destroy']);

Route::apiResource('atividades', AtividadeController::class);

Route::apiResource('componentes', ComponenteController::class);

Route::prefix('custos')->group(function () {
    Route::get('/', [CustoController::class, 'index']);
    Route::get('/{id}', [CustoController::class, 'show']);
    Route::post('/', [CustoController::class, 'store']);
    Route::put('/{id}', [CustoController::class, 'update']);
    Route::delete('/{id}', [CustoController::class, 'destroy']);
});

Route::prefix('relatorio-custo')->group(function () {
    Route::post('/consultar', [RelatorioCustoController::class, 'consultar']);
    Route::get('/tipos', [RelatorioCustoController::class, 'tipos']);
    Route::post('/paginacao', [RelatorioCustoController::class, 'paginacao']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/custo-absorcao', [CustoAbsorcaoController::class, 'index']);
    Route::post('/custo-absorcao', [CustoAbsorcaoController::class, 'store']);
    Route::delete('/custo-absorcao/{id}', [CustoAbsorcaoController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/custos-variaveis', [CustoVariavelController::class, 'index']);
    Route::post('/custos-variaveis', [CustoVariavelController::class, 'store']);
    Route::delete('/custos-variaveis/{id}', [CustoVariavelController::class, 'destroy']);

    Route::get('/custos-variaveis/tipos', [CustoVariavelController::class, 'tipos']);
    Route::get('/custos-variaveis/produtividades', [CustoVariavelController::class, 'produtividades']);
});

Route::middleware('auth:sanctum')->prefix('relatorio-custo-unitario')->group(function () {
    Route::post('/consultar', [RelatorioCustoUnitarioController::class, 'consultar']);
    Route::post('/paginar', [RelatorioCustoUnitarioController::class, 'paginar']);
    Route::get('/tipos', [RelatorioCustoUnitarioController::class, 'carregarTipos']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/relatorios/totais-custo', [RelatorioTotaisCustoController::class, 'consultar']);
});

Route::middleware('auth:sanctum')->prefix('custo-abc')->group(function () {
    Route::get('/', [CustoAbcController::class, 'index']);
    Route::post('/', [CustoAbcController::class, 'store']);
    Route::delete('/{id}', [CustoAbcController::class, 'destroy']);
});

Route::prefix('relatorio-abc')->middleware('auth:sanctum')->group(function () {
    Route::post('consultar', [RelatorioAbcController::class, 'consultar']);
    Route::post('total', [RelatorioAbcController::class, 'total']);
    Route::get('tipos', [RelatorioAbcController::class, 'tipos']);
});