<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;

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

Route::get('/', [NotesController::class, 'index'])->name('notes');
Route::get('/addNote', [NotesController::class, 'create'])->name('create');
Route::post('/addNote', [NotesController::class, 'store'])->name('store');
Route::delete('/addNote/{id}', [NotesController::class, 'destroy'])->name('destroy');

Route::get('/editNote/{id}', [NotesController::class, 'edit'])->name('edit');
Route::put('/editNote/{id}', [NotesController::class, 'update'])->name('update');

Route::get('/noteHistory/{id}', [NotesController::class, 'history'])->name('history');
