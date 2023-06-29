<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\notesController;
use App\Http\Controllers\importantController;

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
})->name('welcome');

//Authentication
Route::get('/register', [authController::class, 'register'])->name('register');
Route::get('/login', [authController::class, 'Login'])->name('login');
Route::get('/logout', [authController::class, 'logout'])->name('logout');
Route::post('/register', [authController::class, 'registerAccount'])->name('registered');
Route::post('/login', [authController::class, 'LoginAccount'])->name('login');

//Dashboard
Route::get('/dashboard/notes', [notesController::class, 'notesDash'])->name('noteDashboard');
Route::get('/dashboard/readNotes/{id}', [notesController::class, 'show'])->name('readNotes');
Route::get('/dashboard/compose', [notesController::class, 'create'])->name('composeNotes');
Route::get('/dashboard/deleteNotes/{id}', [notesController::class, 'destroy'])->name('deleteNotes');
Route::get('/dashboard/editNotes/{id}', [notesController::class, 'edit'])->name('editNotes');
Route::post('/dashboard/editNotes/{id}', [notesController::class, 'update'])->name('editNotes');
Route::post('/dashboard/compose', [notesController::class, 'store'])->name('composeNotes');
Route::resource('/dashboard/notes', notesController::class);

//Important
Route::get('/important/impnotes', [importantController::class, 'importantNote'])->name('importantNote');
Route::get('/important/impcompose', [importantController::class, 'create'])->name('importantCompose');
Route::post('/important/impcompose', [importantController::class, 'store'])->name('composeImporant');
Route::get('/important/impedit/{id}', [importantController::class, 'edit'])->name('editImporant');
Route::post('/important/impedit/{id}', [importantController::class, 'update'])->name('editImporant');
Route::get('/important/impreadNotes/{id}', [importantController::class, 'show'])->name('readImportantNotes');
Route::get('/important/deleteNotes/{id}', [importantController::class, 'destroy'])->name('deleteImportantNotes');
Route::resource('/important/impnotes', importantController::class);