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
Route::post('/events/{event}/reserve', [UserController::class, 'bookEvent'])->name('events.reserve')->middleware('auth');
Route::get('/booked-events', [UserController::class, 'bookedEvents'])->name('bookedEvents');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/events', [AdminController::class, 'index'])->name('admin.events.index');
    Route::get('/events/create', [AdminController::class, 'create'])->name('admin.events.create');
    Route::post('/events', [AdminController::class, 'store'])->name('admin.events.store');
    Route::get('/events/{event}', [AdminController::class, 'show'])->name('admin.events.edit');
    Route::put('/events/{event}', [AdminController::class, 'update'])->name('admin.events.update');
    Route::delete('/events/{event}', [AdminController::class, 'destroy'])->name('admin.events.destroy');
});
Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
