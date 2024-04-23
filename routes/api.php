<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FunFactApiController;

// Endpoint pour récupérer un fun fact aléatoire
Route::get('/funfacts/random', [FunFactApiController::class, 'random']);

// Endpoint pour récupérer tous les fun facts
Route::get('/funfacts', [FunFactApiController::class, 'index']);

// Endpoint protégé par authentification pour récupérer les informations de l'utilisateur
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
