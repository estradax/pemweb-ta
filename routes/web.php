<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\InvoiceReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/admin/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/admin/rooms', [RoomController::class, 'store'])->name('admin.rooms.store');
    Route::get('/admin/rooms/{room}/edit', [RoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::post('/admin/rooms/{room}', [RoomController::class, 'update'])->name('admin.rooms.update');
    Route::get('/admin/rooms/{room}', [RoomController::class, 'destroy'])->name('admin.rooms.destroy');

    Route::get('/admin/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('/admin/reservations/create', [AdminReservationController::class, 'create'])->name('admin.reservations.create');
    Route::post('/admin/reservations', [AdminReservationController::class, 'store'])->name('admin.reservations.store');
    Route::get('/admin/reservations/{reservation}/edit', [AdminReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::post('/admin/reservations/{reservation}', [AdminReservationController::class, 'update'])->name('admin.reservations.update');
    Route::get('/admin/reservations/{reservation}', [AdminReservationController::class, 'destroy'])->name('admin.reservations.destroy');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

    Route::get('/invoice-reservation/{encryptedId}', [InvoiceReservationController::class, 'index'])->name('invoiceReservation.index');

    Route::get('/logout', LogoutController::class)->name('logout');
});

