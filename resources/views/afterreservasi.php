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

    <?php
    
    if ($reservationSuccess) {
        echo '<p>Nomor Reservasi: ABC123</p>';
        echo '<p>User: ' . Auth::user()->name . ' (' . Auth::user()->email . ')</p>';
        echo '<p>Tanggal Check-in: ' . now()->format('Y-m-d') . '</p>';
        echo '<p>Durasi Menginap: ' . $_POST['day_count'] . ' hari</p>';
        echo '<p>Kamar: ' . $_POST['room_id'] . '</p>';
        
    }
    ?>

    <p><a href="welcome.blade.php">Kembali ke Halaman Utama</a></p>
</body>
</html>
