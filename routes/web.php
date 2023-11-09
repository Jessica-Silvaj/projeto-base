<?php

use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\LoginController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\CheckAcesso;

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

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authentication'])->name('login.authentication');
Route::get('/login', [LoginController::class, 'logout'])->name('login.logout');

Route::middleware([CheckAcesso::class])->group( function() {
    //Painel de Controler
    Route::get('/painel', [PainelController::class, 'index'])->name('painel.index');

    // Cadastros Usuarios
    Route::get('/cadastros-usuarios', [UsuarioController::class, 'index'])->name('cadastro.usuario.index');
    Route::get('/cadastros-usuarios-edit{id?}', [UsuarioController::class, 'edit'])->name('cadastro.usuario.edit');
    Route::post('/cadastros-usuarios-store', [UsuarioController::class, 'store'])->name('cadastro.usuario.store');
});

// require __DIR__.'/auth.php';
