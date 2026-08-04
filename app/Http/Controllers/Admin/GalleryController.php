<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGalleryRequest;
use App\Http\Requests\Admin\UpdateGalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::orderBy('order')->paginate(12);

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create(): View
    {
        return view('admin.galleries.create');
    }

    public function store(StoreGalleryRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('galleries', 'public');

        Gallery::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $galeri): View
    {
        return view('admin.galleries.edit', ['gallery' => $galeri]);
    }

    public function update(UpdateGalleryRequest $request, Gallery $galeri): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($galeri->image) {
                Storage::disk('public')->delete($galeri->image);
            }
            $data['image'] = $request->file('image')->store('galleries', 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $galeri): RedirectResponse
    {
        if ($galeri->image) {
            Storage::disk('public')->delete($galeri->image);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
