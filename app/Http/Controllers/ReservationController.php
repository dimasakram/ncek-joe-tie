<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function create(): View
    {
        return view('reservation.create');
    }

    public function store(StoreReservationRequest $request): RedirectResponse
    {
        Reservation::create($request->validated());

        return redirect()->route('reservation.create')->with('success', 'Reservasi berhasil dikirim! Kami akan menghubungi Anda untuk konfirmasi.');
    }
}
