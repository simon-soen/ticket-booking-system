<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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

Route::get('/events', [UserController::class, 'viewEvents'])->name('events.index');
Route::post('/events/book/{event}', [UserController::class, 'bookEvent'])->name('bookEvent');
Route::get('/events/reserve', [UserController::class, 'bookedEvents'])->name('events.reserve');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/events', [AdminController::class, 'index'])->name('admin.events.index');
    Route::get('/events/create', [AdminController::class, 'create'])->name('admin.events.create');
    Route::post('/events', [AdminController::class, 'store'])->name('admin.events.store');
    Route::get('/events/{event}/show', [AdminController::class, 'show'])->name('admin.events.show');
    Route::put('/events/{event}', [AdminController::class, 'update'])->name('admin.events.update'); // Change route name to 'update'
    Route::delete('/events/{event}', [AdminController::class, 'destroy'])->name('admin.events.destroy');
});


Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
