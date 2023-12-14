<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\IsAdmin;

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

Route::middleware(IsAdmin::class)->group(function() {
    Route::get('/admin', DashboardController::class)->name('admin.dashboard.index');

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

    Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/admin/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/admin/rooms', [RoomController::class, 'store'])->name('admin.rooms.store');
    Route::get('/admin/rooms/{room}/edit', [RoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::post('/admin/rooms/{room}', [RoomController::class, 'update'])->name('admin.rooms.update');
    Route::get('/admin/rooms/{room}', [RoomController::class, 'destroy'])->name('admin.rooms.destroy');

    Route::get('/admin/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
