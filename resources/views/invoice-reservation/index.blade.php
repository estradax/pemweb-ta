<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        h2 {
            color: #333;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php

    $reservationSuccess = true;

    if ($reservationSuccess) {
        echo '<h2 class="success">Reservasi Berhasil!</h2>';
    } else {
        echo '<h2 class="error">Reservasi Gagal. Mohon coba lagi.</h2>';
    }
    ?>

    <p>Terima kasih telah memilih hotel kami. Berikut adalah rincian reservasi Anda:</p>

    <p>Nomor Reservasi: {{ $reservation->id }}</p>
    <p>User: {{ $reservation->user->name }} ({{ $reservation->user->email }})</p>
    <p>Tanggal Check-in: {{ $reservation->created_at->format('Y-m-d') }}</p>
    <p>Durasi Menginap: {{ $reservation->day_count }} hari</p>
    <p>Kamar:  {{ $reservation->room->public_id }} </p>
    <p>Total Harga: {{ $reservation->room->price }} x {{ $reservation->day_count }} = {{ $reservation->room->price * $reservation->day_count }} </p>

    <p><a href="{{ route('welcome') }}">Kembali ke Halaman Utama</a></p>
</body>
</html>
