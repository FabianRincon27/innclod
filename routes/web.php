<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\TypeDocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [LoginController::class, 'getLogin'])->name('login.get');
    Route::post('/Iniciar/Sesion', [LoginController::class, 'postLogin'])->name('login.post');

    Route::get('/Registro', [RegisterController::class, 'getRegister'])->name('register.get');
    Route::post('/register', [RegisterController::class, 'postRegister'])->name('register.post');

});

Route::get('/Cerrar/Sesion', [LogoutController::class, 'getLogout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/Documentos', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/Documentos', [DocumentController::class, 'store'])->name('documents.store');
    Route::post('/Documento/{id}', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('/Documento/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    Route::get('/Procesos', [ProcessController::class, 'index'])->name('process.index');
    Route::post('/Procesos', [ProcessController::class, 'store'])->name('process.store');
    Route::post('/Proceso/{id}', [ProcessController::class, 'update'])->name('process.update');
    Route::delete('/Proceso/{id}', [ProcessController::class, 'destroy'])->name('process.destroy');

    Route::get('/Tipo/Documentos', [TypeDocumentController::class, 'index'])->name('typeDocument.index');
    Route::post('/Tipo/Documentos', [TypeDocumentController::class, 'store'])->name('typeDocument.store');
    Route::post('/Tipo/Documento/{id}', [TypeDocumentController::class, 'update'])->name('typeDocument.update');
    Route::delete('/Tipo/Documento/{id}', [TypeDocumentController::class, 'destroy'])->name('typeDocument.destroy');
});


