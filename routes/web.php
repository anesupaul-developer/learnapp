<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

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

Route::get('reservations/create', [ReservationController::class, 'create']);
Route::get('reservations', [ReservationController::class, 'index']);
Route::post('reservations', [ReservationController::class, 'store']);
Route::patch('reservations/checkin/{reservation}', [ReservationController::class, 'update']);
