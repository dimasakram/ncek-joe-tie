<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\View\View;

class PromoController extends Controller
{
    public function index(): View
    {
        $promos = Promo::active()->with('menu')->latest()->paginate(9);

        return view('promo.index', compact('promos'));
    }

    public function show(string $slug): View
    {
        $promo = Promo::with('menu')->where('slug', $slug)->firstOrFail();
        $otherPromos = Promo::active()->where('id', '!=', $promo->id)->limit(3)->get();

        return view('promo.show', compact('promo', 'otherPromos'));
    }
}