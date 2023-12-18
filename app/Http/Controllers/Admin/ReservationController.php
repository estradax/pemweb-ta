<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $users = User::all();
        $rooms = Room::all();

        return view('admin.reservations.create', compact('users', 'rooms'));
    }

    public function store(StoreReservationRequest $request)
    {
        Reservation::create($request->validated());

        return to_route('admin.reservations.index');
    }

    public function edit(Reservation $reservation)
    {
        $users = User::whereNot('id', $reservation->user->id)->get();
        $rooms = Room::whereNot('id', $reservation->room->id)->get();

        return view('admin.reservations.edit', compact('reservation', 'users', 'rooms'));
    }

    public function update(Reservation $reservation, UpdateReservationRequest $request)
    {
        $reservation->update($request->validated());

        return to_route('admin.reservations.index');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return to_route('admin.reservations.index');
    }
}
