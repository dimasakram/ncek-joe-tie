<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Promo;
use App\Models\RestaurantProfile;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $bestSellers = Menu::where('is_best_seller', true)->where('is_available', true)->limit(6)->get();
        $promos = Promo::active()->latest()->limit(3)->get();
        $galleries = Gallery::orderBy('order')->limit(8)->get();
        $testimonials = Testimonial::where('is_featured', true)->latest()->limit(6)->get();
        $faqs = Faq::where('is_active', true)->orderBy('order')->limit(6)->get();

        return view('home', compact('bestSellers', 'promos', 'galleries', 'testimonials', 'faqs'));
    }

    public function about(): View
    {
        $profile = RestaurantProfile::first();

        return view('about', compact('profile'));
    }
}
