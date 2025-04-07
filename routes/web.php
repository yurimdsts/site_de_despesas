<?php

use App\Http\Controllers\DespesaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homeuser');
});

// Rota para exibir o formulário de criação de despesa
Route::get('/despesas/criar', [DespesaController::class, 'create'])->name('despesas.create');

// Rota para exibir as despesas (com filtro opcional por usuário)
Route::get('/despesas', [DespesaController::class, 'index'])->name('despesas.index');

// Rota para salvar uma nova despesa
Route::post('/despesas/salvar', [DespesaController::class, 'store'])->name('despesas.salvar');

// Rota para listar todas as despesas cadastradas
Route::get('/despesas/listar', [DespesaController::class, 'list'])->name('despesas.listar');

// Rota para editar todas as despesas cadastradas
Route::get('/despesas/{id}/edit', [DespesaController::class, 'edit'])->name('despesas.edit');

Route::put('/despesas/{despesa}/update', [DespesaController::class, 'update'])->name('despesas.update');

// Rota para deletar a despesa cadastrada
Route::delete('/despesas/{despesa}', [DespesaController::class, 'destroy'])->name('despesas.destroy');

// Rota para calcular a diferença entre o salário e as despesas
Route::post('/despesas/calcular', [DespesaController::class, 'calcular'])->name('despesas.calcular');

Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/user/list', [UserController::class, 'list'])->name('user.list');

Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

Route::post('/user', [UserController::class, 'store'])->name('user.store');

Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

Route::post('/email', [UserController::class, 'store'])->name('email.store');

// Nova rota não é mais necessária, pois index aceitará o filtro por usuário
// Route::get('/user/{id}/despesas', [DespesaController::class, 'despesasPorUsuario'])->name('user.despesas');
