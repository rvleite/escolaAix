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

Route::get('/ListAluno', [App\Http\Controllers\AlunosController::class, 'index'])->name('ListAluno');
Route::get('/CadAluno', [App\Http\Controllers\AlunosController::class, 'create'])->name('CadAluno');

Route::get('/CadCurso', [App\Http\Controllers\CursosController::class, 'index'])->name('CadCurso');
Route::get('/CadCursoPost', [App\Http\Controllers\CursosController::class, 'create'])->name('CadCursoPost');

Route::get('/import', [App\Http\Controllers\ImportController::class, 'index'])->name('ImportCurso');
Route::post('/importPost', [App\Http\Controllers\ImportController::class, 'create'])->name('ImportCursoPost');
