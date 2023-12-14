<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(StoreRoomRequest $request)
    {
        $data = $request->validated();

        Room::create($data);

        return to_route('admin.rooms.index');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Room $room, UpdateRoomRequest $request)
    {
        $data = $request->validated();

        $room->update($data);

        return to_route('admin.rooms.index');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return to_route('admin.rooms.index');
    }
}
