<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
// use Closure;


use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::middleware('auth','verify-email')->group(function () {
Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('sessaos',SessaoController::class);

    Route::controller(SessaoController::class)->group(function(){


        Route::post('sessao/store','store')->name('sessao.store');


        Route::get('sessao/all','all')->name('sessao.all');
        Route::get('sessao/closeds','closeds')->name('sessao.closeds');
        Route::get('sessao/opens','opens')->name('sessao.opens');


        Route::get('sessao/closedPage/{sessao}','closedPage')->name('sessao.closedPage');
        Route::post('sessao/closed/{sessao}','closed')->name('sessao.closed');

        Route::get('sessao/reopen/{sessao}','reopen')->name('sessao.reopen');

        Route::get('sessao/details/{sessao}','details')->name('sessao.details');
    });

    Route::resource('categorias',CategoriaController::class);

    Route::resource('projetos',ProjetoController::class);
    Route::post('projeto/update',[ProjetoController::class,'update'])->name('projeto.update');

    Route::get('projeto/inProduction',[ProjetoController::class,'inProduction']);
    Route::get('projeto/outProduction',[ProjetoController::class,'outProduction']);

    Route::get('projeto/closed/{projeto}',[ProjetoController::class,'closed']);
    
    Route::get('projeto/reopen/{projeto}',[ProjetoController::class,'reopen']);

    Route::get('projeto/sessionsProject/{projeto}',[ProjetoController::class,'sessionsProject']);


    Route::resource('users',UserController::class);
    Route::post('user/update/{user}',[UserController::class,'update'])->name('user.update');

    Route::post('search',[SearchController::class,'search'])->name('search');

    Route::get('back',function(Request $request){
        return back();
    })->name('back');

    Route::get('/support',function(){
        return view('support.index');
    });
});

require __DIR__.'/auth.php';
