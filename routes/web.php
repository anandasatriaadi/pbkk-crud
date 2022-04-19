<?php

use App\Http\Controllers\FilmController;
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

Route::get('/', [FilmController::class, 'index'])->name('home');
Route::get('/film/show/{id}', [FilmController::class, 'show'])->name('film.show');
Route::get('/film/add', [FilmController::class, 'create'])->name('film.add');
Route::post('/film/add', [FilmController::class, 'store'])->name('film.store');
Route::get('/film/edit/{id}', [FilmController::class, 'edit'])->name('film.edit');
Route::put('/film/update/{id}', [FilmController::class, 'update'])->name('film.update');
Route::delete('/film/destroy/{id}', [FilmController::class, 'destroy'])->name('film.destroy');