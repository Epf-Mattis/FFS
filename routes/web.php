<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FunFactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FunFactApiController;


Route::get('/', function () {
    return view('FunFact');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/funfacts', [FunFactController::class, 'store'])->name('funfacts.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    
Route::middleware(['auth'])->group(function () {
    // Routes pour approuver ou refuser un Fun Fact
    Route::put('/funfacts/{funFact}', [FunFactController::class, 'update'])->name('funfacts.update');
    Route::post('/funfacts/{id}/modify', [FunFactController::class, 'modify'])->name('funfacts.modify');
    Route::post('/funfacts/{id}/approve', [FunFactController::class, 'approve'])->name('funfacts.approve');
    Route::post('/funfacts/{id}/reject', [FunFactController::class, 'reject'])->name('funfacts.reject');
});

// Route pour l'API 
Route::get('/funfacts/random', [FunFactApiController::class, 'random']);
Route::get('/funfacts', [FunFactApiController::class, 'index']);


require __DIR__.'/auth.php';
