<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateReservationStatusRequest;
use App\Models\Reservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function index(Request $request): View
    {
        $reservations = Reservation::when($request->status, fn ($q) => $q->where('status', $request->status))
            ->when($request->search, fn ($q) => $q->where('name', 'like', "%{$request->search}%"))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.reservations.index', compact('reservations'));
    }

    public function show(Reservation $reservasi): View
    {
        return view('admin.reservations.show', ['reservation' => $reservasi]);
    }

    public function update(UpdateReservationStatusRequest $request, Reservation $reservasi): RedirectResponse
    {
        $reservasi->update($request->validated());

        return redirect()->route('admin.reservasi.index')->with('success', 'Status reservasi berhasil diperbarui.');
    }

    public function destroy(Reservation $reservasi): RedirectResponse
    {
        $reservasi->delete();

        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi berhasil dihapus.');
    }
}
