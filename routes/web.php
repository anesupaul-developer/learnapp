<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
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

Auth::routes();

Route::get('/students', [StudentsController::class, 'create']);
Route::get('/students/list', [StudentsController::class, 'index']);
Route::post('/students', [StudentsController::class, 'store']);
Route::patch('/students/{student}', [StudentsController::class, 'update']);
Route::delete('/students/{student}', [StudentsController::class, 'destroy']);

Route::post('books', [BookController::class, 'store']);
Route::get('books', [BookController::class, 'index']);
Route::get('books/create', [BookController::class, 'create']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
