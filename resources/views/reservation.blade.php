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

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Proses formulir disini
            $nama = $_POST["nama"];
            $checkin = $_POST["checkin"];
            $checkout = $_POST["checkout"];
            $jumlah = $_POST["jumlah"];

            // Lakukan pemrosesan lebih lanjut, misalnya menyimpan ke database
            // ...

            echo "<p style='color: #fff; text-align: center;'>Reservasi untuk $nama berhasil dibuat.</p>";
        }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nama">Nama Pelanggan:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="checkin">Tanggal Check-in:</label>
        <input type="date" id="checkin" name="checkin" required>

        <label for="checkout">Tanggal Check-out:</label>
        <input type="date" id="checkout" name="checkout" required>

        <label for="jumlah">Jumlah Tamu:</label>
        <input type="number" id="jumlah" name="jumlah" min="1" required>

        <button type="submit">Submit Reservasi</button>
    </form>

</body>
</html>
