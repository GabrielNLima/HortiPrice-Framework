<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\DirecionadorController;
use App\Http\Controllers\Api\SubCategoriaController;

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

