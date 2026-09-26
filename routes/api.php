<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnderecoController;

Route::get('/enderecos', [EnderecoController::class, 'index']);
Route::get('/enderecos/{cep}', [EnderecoController::class, 'buscar']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
