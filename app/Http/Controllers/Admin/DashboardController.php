<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Menu;
use App\Models\Promo;
use App\Models\Reservation;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'menu' => Menu::count(),
            'reservasi' => Reservation::count(),
            'artikel' => Article::count(),
            'promo' => Promo::count(),
            'testimoni' => Testimonial::count(),
        ];

        $reservationsPerMonth = Reservation::selectRaw('MONTH(date) as month, COUNT(*) as total')
            ->whereYear('date', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month');

        $chartData = collect(range(1, 12))->map(fn ($m) => $reservationsPerMonth[$m] ?? 0);

        $latestReservations = Reservation::latest()->limit(5)->get();

        return view('admin.dashboard.index', compact('stats', 'chartData', 'latestReservations'));
    }
}
