<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        $settings = Setting::pluck('value', 'key');

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(UpdateSettingRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('favicon')) {
            $oldFavicon = Setting::get('favicon');
            if ($oldFavicon) {
                Storage::disk('public')->delete($oldFavicon);
            }
            $data['favicon'] = $request->file('favicon')->store('settings', 'public');
        } else {
            // Tidak ada file baru diupload: jangan timpa favicon yang sudah ada dengan kosong.
            unset($data['favicon']);
        }

        if ($request->hasFile('og_image')) {
            $oldOgImage = Setting::get('og_image');
            if ($oldOgImage) {
                Storage::disk('public')->delete($oldOgImage);
            }
            $data['og_image'] = $request->file('og_image')->store('settings', 'public');
        } else {
            unset($data['og_image']);
        }

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}