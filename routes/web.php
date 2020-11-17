<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route para listar os alunos cadastrados
Route::get('/ListAluno', [App\Http\Controllers\AlunosController::class, 'index'])->name('ListAluno');

Route::get('/CadAluno', [App\Http\Controllers\AlunosController::class, 'create'])->name('CadAluno');
Route::post('/CadAlunoPost', [App\Http\Controllers\AlunosController::class, 'store'])->name('CadAlunoPost');
Route::get('/ShowAluno', [App\Http\Controllers\AlunosController::class, 'show'])->name('ShowAluno');
Route::get('/ShowAluno/edit/{id}', [App\Http\Controllers\AlunosController::class, 'edit'])->name('EditAluno');
Route::post('/ShowAluno/edit/{id}', [App\Http\Controllers\AlunosController::class, 'update'])->name('updateAluno');
Route::get('/ShowAluno/delete/{id}', [App\Http\Controllers\AlunosController::class, 'destroy'])->name('DeleteAluno');

// cadastrar cursos
Route::get('/CadCurso', [App\Http\Controllers\CursosController::class, 'index'])->name('CadCurso');
Route::post('/CadCursoPost', [App\Http\Controllers\CursosController::class, 'create'])->name('CadCursoPost');
Route::get('/ShowCurso', [App\Http\Controllers\CursosController::class, 'show'])->name('ShowCurso');
Route::get('/ShowCurso/edit/{codigo}', [App\Http\Controllers\CursosController::class, 'edit'])->name('EditCurso');
Route::post('/ShowCurso/edit/{codigo}', [App\Http\Controllers\CursosController::class, 'update'])->name('updateCurso');
Route::get('/ShowCurso/delete/{codigo}', [App\Http\Controllers\CursosController::class, 'destroy'])->name('DeleteCurso');


//Cadastrar arquivos xml
Route::get('/import', [App\Http\Controllers\ImportController::class, 'index'])->name('ImportCurso');
Route::post('/importPost', [App\Http\Controllers\ImportController::class, 'create'])->name('ImportCursoPost');
