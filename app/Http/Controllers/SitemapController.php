<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Menu;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = collect([
            ['loc' => route('home'), 'priority' => '1.0'],
            ['loc' => route('about'), 'priority' => '0.7'],
            ['loc' => route('menu.index'), 'priority' => '0.9'],
            ['loc' => route('promo.index'), 'priority' => '0.7'],
            ['loc' => route('gallery.index'), 'priority' => '0.6'],
            ['loc' => route('article.index'), 'priority' => '0.7'],
            ['loc' => route('reservation.create'), 'priority' => '0.8'],
            ['loc' => route('contact.create'), 'priority' => '0.6'],
        ]);

        Menu::where('is_available', true)->get()->each(function ($menu) use ($urls) {
            $urls->push(['loc' => route('menu.show', $menu->slug), 'priority' => '0.6']);
        });

        Article::published()->get()->each(function ($article) use ($urls) {
            $urls->push(['loc' => route('article.show', $article->slug), 'priority' => '0.5']);
        });

        $xml = view('sitemap', compact('urls'))->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
