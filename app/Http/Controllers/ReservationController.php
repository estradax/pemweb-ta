<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserReservationRequest;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $rooms = Room::whereNotIn('id', Reservation::all('room_id'))->get();

        return view('reservation', compact('rooms'));
    }

    public function store(StoreUserReservationRequest $request)
    {
        Reservation::create([
            'user_id' => Auth::user()->id,
            'room_id' => $request->validated('room_id'),
            'day_count' => $request->validated('day_count')
        ]);

        return to_route('welcome');
    }
}
