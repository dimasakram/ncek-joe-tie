<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRestaurantProfileRequest;
use App\Models\RestaurantProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class RestaurantProfileController extends Controller
{
    public function edit(): View
    {
        $profile = RestaurantProfile::firstOrCreate(['id' => 1]);

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(UpdateRestaurantProfileRequest $request): RedirectResponse
    {
        $profile = RestaurantProfile::firstOrCreate(['id' => 1]);
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }
            $data['logo'] = $request->file('logo')->store('profile', 'public');
        } else {
            unset($data['logo']);
        }

        $profile->update($data);

        return redirect()->route('admin.profil.edit')->with('success', 'Profil restoran berhasil diperbarui.');
    }
}   