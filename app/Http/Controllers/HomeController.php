<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $bestSellers = collect();
        foreach (Category::orderBy('order')->get() as $category) {
            $item = Menu::where('category_id', $category->id)->where('is_available', true)
                ->orderByDesc('is_best_seller')->first();
            if ($item) {
                $bestSellers->push($item);
            }
        }
        $extra = Menu::where('is_available', true)
            ->whereNotIn('id', $bestSellers->pluck('id'))
            ->orderByDesc('is_best_seller')
            ->limit(6 - $bestSellers->count())
            ->get();
        $bestSellers = $bestSellers->merge($extra)->take(6);

        $promos = Promo::active()->latest()->limit(3)->get();
        $galleries = Gallery::orderBy('order')->limit(6)->get();
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