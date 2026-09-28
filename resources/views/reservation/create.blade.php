@extends('layouts.app')
@section('title', 'Reservasi')
@section('content')

{{-- HERO --}}
<section class="position-relative d-flex align-items-center rustic-texture" style="min-height: 55vh; overflow:hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image:url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=1600&q=80'); background-size:cover; background-position:center;"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(46,71,32,0.55), rgba(62,95,43,0.9));"></div>
    <div class="container text-center text-white position-relative fade-up show" style="z-index:2; padding-top:60px; padding-bottom:70px;">
        <p class="handwritten fs-2 mb-1" style="color: var(--coral); transform: rotate(-2deg);">Amankan tempatmu</p>
        <h1 class="display-4 fw-bold" style="color: var(--cream);">Reservasi Meja</h1>
        <p class="fs-5" style="color: rgba(248,242,231,0.85);">Nikmati waktumu tanpa harus menunggu di {{ $profile->name ?? 'Ncek Joe Tie' }}</p>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--cream)"></path></svg></div>
</section>

{{-- INFO + FORM RESERVASI --}}
<section class="py-5" style="padding-top:4.5rem; position:relative; overflow:hidden;">
    <div class="container" style="padding-bottom: 5rem;">
        <div class="row g-4">
            {{-- INFO RESERVASI --}}
            <div class="col-lg-4 fade-up show">
                <div class="p-4 p-md-5 h-100" style="background:#fff; border-radius:20px; box-shadow: 0 10px 30px rgba(46,71,32,0.08);">
                    <p class="handwritten fs-3 mb-1" style="color: var(--coral); padding-bottom: 15px;">Sebelum kamu datang</p>
                    <h5 class="fw-semibold mb-4" style="color: var(--dark-olive); font-family:'Fraunces',serif;">Info Reservasi</h5>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width:44px; height:44px; border-radius:50%; background: var(--beige);">
                            <i class="bi bi-clock-fill" style="color: var(--coral);"></i>
                        </div>
                        <div>
                            <p class="small text-uppercase fw-semibold mb-1" style="color: var(--olive); letter-spacing:.5px;">Jam Operasional</p>
                            <p class="mb-0 text-muted">{{ $profile->opening_hours ?? 'Setiap hari, 09.00 - 22.00 WIB' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width:44px; height:44px; border-radius:50%; background: var(--beige);">
                            <i class="bi bi-people-fill" style="color: var(--coral);"></i>
                        </div>
                        <div>
                            <p class="small text-uppercase fw-semibold mb-1" style="color: var(--olive); letter-spacing:.5px;">Rombongan Besar</p>
                            <p class="mb-0 text-muted">Untuk acara atau grup di atas 10 orang, hubungi kami langsung lewat WhatsApp ya.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width:44px; height:44px; border-radius:50%; background: var(--beige);">
                            <i class="bi bi-check-circle-fill" style="color: var(--coral);"></i>
                        </div>
                        <div>
                            <p class="small text-uppercase fw-semibold mb-1" style="color: var(--olive); letter-spacing:.5px;">Konfirmasi</p>
                            <p class="mb-0 text-muted">Tim kami akan menghubungimu untuk konfirmasi setelah reservasi terkirim.</p>
                        </div>
                    </div>

                    @if (!empty($profile->whatsapp))
                        <a href="https://wa.me/{{ $profile->whatsapp }}" target="_blank" class="btn btn-outline-olive w-100 mt-2"><i class="bi bi-whatsapp me-1"></i> Chat via WhatsApp</a>
                    @endif
                </div>
            </div>

            {{-- FORM RESERVASI --}}
            <div class="col-lg-8 fade-up show">
                <div class="p-4 p-md-5 h-100" style="background:#fff; border-radius:20px; box-shadow: 0 10px 30px rgba(46,71,32,0.08);">
                    <p class="handwritten fs-3 mb-1" style="color: var(--coral); padding-bottom: 15px;">Yuk, pesan tempatmu</p>
                    <h5 class="fw-semibold mb-4" style="color: var(--dark-olive); font-family:'Fraunces',serif;">Form Reservasi</h5>

                    <form method="POST" action="{{ route('reservation.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white" style="border-radius:12px 0 0 12px; border-color: var(--beige);"><i class="bi bi-person" style="color: var(--coral);"></i></span>
                                <input type="text" name="name" class="form-control" style="border-radius:0 12px 12px 0; padding:.7rem 1rem; border-color: var(--beige);" value="{{ old('name') }}" required>
                            </div>
                            @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Nomor HP / WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white" style="border-radius:12px 0 0 12px; border-color: var(--beige);"><i class="bi bi-whatsapp" style="color: var(--coral);"></i></span>
                                <input type="text" name="phone" class="form-control" style="border-radius:0 12px 12px 0; padding:.7rem 1rem; border-color: var(--beige);" value="{{ old('phone') }}" required>
                            </div>
                            @error('phone')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold small">Jumlah Orang</label>
                                <input type="number" name="guests" min="1" class="form-control" style="border-radius:12px; padding:.7rem 1rem; border-color: var(--beige);" value="{{ old('guests', 2) }}" required>
                                @error('guests')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold small">Tanggal</label>
                                <input type="date" name="date" class="form-control" style="border-radius:12px; padding:.7rem 1rem; border-color: var(--beige);" value="{{ old('date') }}" required>
                                @error('date')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold small">Jam</label>
                                <input type="time" name="time" class="form-control" style="border-radius:12px; padding:.7rem 1rem; border-color: var(--beige);" value="{{ old('time') }}" required>
                                @error('time')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold small">Catatan (opsional)</label>
                            <textarea name="notes" class="form-control" rows="3" style="border-radius:12px; padding:.7rem 1rem; border-color: var(--beige);" placeholder="Contoh: dekat jendela, ada acara ulang tahun, dll.">{{ old('notes') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-coral btn-lg rounded-pill px-4 w-100">Kirim Reservasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--dark-olive)"></path></svg></div>
</section>

@endsection