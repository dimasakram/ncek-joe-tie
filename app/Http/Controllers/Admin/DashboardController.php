<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Gallery;
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

        $activities = collect();

        Menu::latest()->limit(5)->get()->each(function ($m) use ($activities) {
            $activities->push([
                'icon' => 'bi-egg-fried',
                'color' => '#3E5F2B',
                'text' => "Menu baru ditambahkan: <strong>".e($m->name)."</strong>",
                'time' => $m->created_at,
            ]);
        });

        Reservation::latest()->limit(5)->get()->each(function ($r) use ($activities) {
            $activities->push([
                'icon' => 'bi-calendar-check',
                'color' => '#E06A4B',
                'text' => "Reservasi baru dari <strong>{$r->name}</strong> untuk {$r->guests} orang",
                'time' => $r->created_at,
            ]);
        });

        Contact::latest()->limit(5)->get()->each(function ($c) use ($activities) {
            $activities->push([
                'icon' => 'bi-envelope',
                'color' => '#3E5F2B',
                'text' => "Pesan kontak baru dari <strong>{$c->name}</strong>",
                'time' => $c->created_at,
            ]);
        });

        Testimonial::latest()->limit(5)->get()->each(function ($t) use ($activities) {
            $activities->push([
                'icon' => 'bi-chat-quote',
                'color' => '#2E4720',
                'text' => "Testimoni baru dari <strong>{$t->name}</strong>",
                'time' => $t->created_at,
            ]);
        });

        Article::latest()->limit(5)->get()->each(function ($a) use ($activities) {
            $activities->push([
                'icon' => 'bi-newspaper',
                'color' => '#E06A4B',
                'text' => "Artikel baru: <strong>".e($a->title)."</strong>",
                'time' => $a->created_at,
            ]);
        });

        Promo::latest()->limit(5)->get()->each(function ($p) use ($activities) {
            $activities->push([
                'icon' => 'bi-percent',
                'color' => '#E06A4B',
                'text' => "Promo baru ditambahkan: <strong>".e($p->title)."</strong>",
                'time' => $p->created_at,
            ]);
        });

        Gallery::latest()->limit(5)->get()->each(function ($g) use ($activities) {
            $activities->push([
                'icon' => 'bi-images',
                'color' => '#2E4720',
                'text' => "Foto galeri baru: <strong>".e($g->title)."</strong>",
                'time' => $g->created_at,
            ]);
        });

        $activities = $activities->sortByDesc('time')->take(8)->values();

        return view('admin.dashboard.index', compact('stats', 'chartData', 'latestReservations', 'activities'));
    }
}