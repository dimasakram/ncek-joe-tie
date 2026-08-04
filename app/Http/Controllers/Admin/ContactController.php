<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(Request $request): View
    {
        $contacts = Contact::when($request->search, fn ($q) => $q->where('name', 'like', "%{$request->search}%"))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $kontak): View
    {
        if (! $kontak->is_read) {
            $kontak->update(['is_read' => true]);
        }

        return view('admin.contacts.show', ['contact' => $kontak]);
    }

    public function destroy(Contact $kontak): RedirectResponse
    {
        $kontak->delete();

        return redirect()->route('admin.kontak.index')->with('success', 'Pesan kontak berhasil dihapus.');
    }
}
