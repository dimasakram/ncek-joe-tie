@extends('layouts.app')
@section('title', 'Reservasi')
@section('content')

<section style="background: var(--dark-olive); padding: 140px 0 60px;">
    <div class="container text-center text-white">
        <h1 class="fw-bold" style="color: var(--cream);">Reservasi Meja</h1>
        <p style="color: rgba(248,242,231,0.8);">Amankan tempat favoritmu di {{ $profile->name ?? 'Ncek Joe Tie' }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 650px;">
        <div class="card border-0 shadow-sm p-4 p-md-5 fade-up show">
            <form method="POST" action="{{ route('reservation.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nomor HP / WhatsApp</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                    @error('phone')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Jumlah Orang</label>
                        <input type="number" name="guests" min="1" class="form-control" value="{{ old('guests', 2) }}" required>
                        @error('guests')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Tanggal</label>
                        <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
                        @error('date')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jam</label>
                    <input type="time" name="time" class="form-control" value="{{ old('time') }}" required>
                    @error('time')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Catatan (opsional)</label>
                    <textarea name="notes" class="form-control" rows="3" placeholder="Contoh: dekat jendela, ada acara ulang tahun, dll.">{{ old('notes') }}</textarea>
                </div>
                <button type="submit" class="btn btn-coral w-100 btn-lg">Kirim Reservasi</button>
            </form>
        </div>
    </div>
</section>

@endsection
