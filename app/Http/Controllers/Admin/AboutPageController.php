<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAboutPageRequest;
use App\Models\AboutPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AboutPageController extends Controller
{
    public function edit(): View
    {
        $about = AboutPage::firstOrCreate(['id' => 1]);

        return view('admin.about.edit', compact('about'));
    }

    public function update(UpdateAboutPageRequest $request): RedirectResponse
    {
        $about = AboutPage::firstOrCreate(['id' => 1]);
        $data = $request->validated();

        if ($request->hasFile('cover_photo')) {
            if ($about->cover_photo) {
                Storage::disk('public')->delete($about->cover_photo);
            }
            $data['cover_photo'] = $request->file('cover_photo')->store('about', 'public');
        } else {
            unset($data['cover_photo']);
        }

        if ($request->hasFile('coffee_sourcing_image')) {
            if ($about->coffee_sourcing_image) {
                Storage::disk('public')->delete($about->coffee_sourcing_image);
            }
            $data['coffee_sourcing_image'] = $request->file('coffee_sourcing_image')->store('about', 'public');
        } else {
            unset($data['coffee_sourcing_image']);
        }

        $about->update($data);

        return redirect()->route('admin.tentang.edit')->with('success', 'Halaman Tentang berhasil diperbarui.');
    }
}