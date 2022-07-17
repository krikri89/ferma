<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmController as F;
use Illuminate\Support\Facades\Auth;


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
Route::get('/animals', [F::class, 'index'])->name('animals-index');
Route::get('/animals/create', [F::class, 'create'])->name('animals-create');
Route::post('/animals', [F::class, 'store'])->name('animals-store');
Route::get('/animals/edit/{farm}', [F::class, 'edit'])->name('animals-edit');
Route::put('/animals/{farm}', [F::class, 'update'])->name('animals-update');
Route::delete('/animals/{farm}', [F::class, 'destroy'])->name('animals-delete');
Route::get('/animals/show/{id}', [F::class, 'show'])->name('animals-show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
