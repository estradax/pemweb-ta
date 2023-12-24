<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class InvoiceReservationController extends Controller
{
    public function index(string $encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
        } catch (DecryptException $e) {
            return to_route('welcome');
        }

        $reservation = Reservation::findOrFail($id);

        return view('invoice-reservation.index', compact('reservation'));
    }
}
