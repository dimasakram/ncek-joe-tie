<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    public function index(Request $request): View
    {
        $menus = Menu::with('category')
            ->where('is_available', true)
            ->when($request->search, fn ($q) => $q->where('name', 'like', "%{$request->search}%"))
            ->when($request->category, fn ($q) => $q->whereHas('category', fn ($c) => $c->where('slug', $request->category)))
            ->latest()
            ->paginate(9)
            ->withQueryString();

        $categories = Category::orderBy('order')->get();

        return view('menu.index', compact('menus', 'categories'));
    }

    public function show(string $slug): View
    {
        $menu = Menu::with('category')->where('slug', $slug)->firstOrFail();
        $menu->increment('views');
        $relatedMenus = $menu->relatedMenus();

        return view('menu.show', compact('menu', 'relatedMenus'));
    }
}
