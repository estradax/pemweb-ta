<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            display: grid;
            place-items: center;
            background-color: #614E42;
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

        .invoice {
            width: 600px;
            background-color: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body>
<div class="card invoice">
  <div class="card-body mx-4">
    <div class="container">
      <p class="my-5 mx-5" style="font-size: 30px;">Terima kasih</p>
      <div class="row">
        <ul class="list-unstyled">
          <li class="text-black">{{ $reservation->user->name }} ({{ $reservation->user->email }})</li>
          <li class="text-muted mt-1"><span class="text-black">Invoice</span> #{{ $reservation->id }}</li>
          <li class="text-black mt-1">{{ $reservation->created_at->format('Y-m-d') }}</li>
        </ul>
        <hr>
        <div class="col-xl-10">
          <p>{{ $reservation->room->public_id }}</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">${{ $reservation->room->price }}
          </p>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col-xl-10">
          <p>Day Count</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">{{ $reservation->day_count }}
          </p>
        </div>
        <hr>
      </div>
      <div class="row text-black">

        <div class="col-xl-12">
          <p class="float-end fw-bold">Total: ${{ $reservation->room->price * $reservation->day_count }}
          </p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="text-center" style="margin-top: 90px;">

    <p><a href="{{ route('welcome') }}">Kembali ke Halaman Utama</a></p>
      </div>

    </div>
  </div>
</div>
</body>
</html>
