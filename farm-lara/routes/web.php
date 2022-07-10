<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmController as F;


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
Route::get('/animals/form', [F::class, 'form'])->name('animals-create');
Route::post('/animals', [F::class, 'store'])->name('animals-store');
Route::get('/animals/edit/{id}', [F::class, 'edit'])->name('animals-edit');
Route::put('/animals/{id}', [F::class, 'update'])->name('animals-update');
Route::delete('/animals/{id}', [F::class, 'destroy'])->name('animals-delete');
