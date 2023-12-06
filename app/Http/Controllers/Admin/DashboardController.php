<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $users = User::take(5)->get();
        $rooms = Room::take(5)->get();
        $reservations = Reservation::take(5)->with(['user', 'room'])->get();

        return view('admin.dashboard.index', compact('users', 'rooms', 'reservations'));
    }
}
