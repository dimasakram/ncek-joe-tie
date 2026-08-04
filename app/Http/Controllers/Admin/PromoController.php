<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePromoRequest;
use App\Http\Requests\Admin\UpdatePromoRequest;
use App\Models\Menu;
use App\Models\Promo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PromoController extends Controller
{
    public function index(Request $request): View
    {
        $promos = Promo::with('menu')
            ->when($request->search, fn ($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.promos.index', compact('promos'));
    }

    public function create(): View
    {
        $menus = Menu::orderBy('name')->get();

        return view('admin.promos.create', compact('menus'));
    }

    public function store(StorePromoRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('promos', 'public');
        }

        Promo::create($data);

        return redirect()->route('admin.promo.index')->with('success', 'Promo berhasil ditambahkan.');
    }

    public function edit(Promo $promo): View
    {
        $menus = Menu::orderBy('name')->get();

        return view('admin.promos.edit', compact('promo', 'menus'));
    }

    public function update(UpdatePromoRequest $request, Promo $promo): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            if ($promo->image) {
                Storage::disk('public')->delete($promo->image);
            }
            $data['image'] = $request->file('image')->store('promos', 'public');
        }

        $promo->update($data);

        return redirect()->route('admin.promo.index')->with('success', 'Promo berhasil diperbarui.');
    }

    public function destroy(Promo $promo): RedirectResponse
    {
        if ($promo->image) {
            Storage::disk('public')->delete($promo->image);
        }

        $promo->delete();

        return redirect()->route('admin.promo.index')->with('success', 'Promo berhasil dihapus.');
    }
}
