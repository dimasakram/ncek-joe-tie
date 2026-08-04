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
}
