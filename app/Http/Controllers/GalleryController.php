<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(Request $request): View
    {
        $galleries = Gallery::when($request->category, fn ($q) => $q->where('category', $request->category))
            ->orderBy('order')
            ->paginate(12)
            ->withQueryString();

        $featured = Gallery::orderBy('order')->limit(4)->get();

        return view('gallery.index', compact('galleries', 'featured'));
    }
}