<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\RestaurantProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        $profile = RestaurantProfile::first();

        return view('contact.create', compact('profile'));
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        Contact::create($request->validated());

        return redirect()->route('contact.create')->with('success', 'Pesan Anda berhasil dikirim. Terima kasih telah menghubungi kami!');
    }
}
