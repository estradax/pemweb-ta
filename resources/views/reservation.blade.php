<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #614E42;
        }
        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }

        img {
            max-width: 100%;
            width: 600px;
            margin-right: 2rem;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <img src="https://images.unsplash.com/photo-1455587734955-081b22074882?q=80&w=1920&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
    <form action="{{ route('reservation.store') }}" method="post">
        @csrf

        <label for="nama">User:</label>
        <input disabled type="text" id="nama" name="nama" value="{{ Auth::user()->name }} ({{ Auth::user()->email }})">

        <label for="checkin">Check-in:</label>
        <input disabled type="date" id="checkin" name="checkin" value="{{ now()->format('Y-m-d') }}">

        <label for="day_count">Day count:</label>
        <input type="number" id="day_count" name="day_count">

        <label>Room:</label>
        <select class="form-control select2" name="room_id">
            <option value="">Select...</option>
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->public_id }} Cap. {{ $room->bed_count }}</option>
            @endforeach
        </select>

        <button type="submit">Submit Reservasi</button>
    </form>

</body>
</html>
