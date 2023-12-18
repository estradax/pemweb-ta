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
            background-image: url('bg-masthead.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
    </style>
</head>
<body>

    <h2 style="text-align: center; color: #fff;">Reservasi Hotel</h2>

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
