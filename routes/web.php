<?php

use App\Http\Controllers\DespesaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// 🔹 Rotas de Usuário
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/list', [UserController::class, 'list'])->name('user.list'); // Rota de listagem de usuários
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

// 🔹 Rota para envio de e-mails (se necessário)
Route::post('/email', [UserController::class, 'store'])->name('email.store');

// 🔹 Rotas de Despesas
Route::prefix('despesas')->group(function () {
    Route::get('/', [DespesaController::class, 'index'])->name('despesas.index');
    Route::get('/criar', [DespesaController::class, 'create'])->name('despesas.create');
    Route::post('/salvar', [DespesaController::class, 'store'])->name('despesas.salvar');
    Route::get('/listar', [DespesaController::class, 'list'])->name('despesas.listar');
    Route::get('/{despesa}/edit', [DespesaController::class, 'edit'])->name('despesas.edit');
    Route::put('/{despesa}/update', [DespesaController::class, 'update'])->name('despesas.update');
    Route::delete('/{despesa}', [DespesaController::class, 'destroy'])->name('despesas.destroy');
    Route::post('/calcular', [DespesaController::class, 'calcular'])->name('despesas.calcular');
});
