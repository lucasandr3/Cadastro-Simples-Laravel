<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FornecedorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/cadastro/empresa');
});

//Rotas da Empresa
Route::get('/cadastro/empresa', [EmpresaController::class, 'index'])->name('empresa');
Route::post('/empresa', [EmpresaController::class, 'addAction']);

// Rotas do Fornecedor
Route::get('/fornecedores', [FornecedorController::class,'index']);
Route::get('/cadastro/fornecedor', [FornecedorController::class,'register'])->name('fornecedor');
Route::post('/novo/fornecedor', [FornecedorController::class,'addAction']);
