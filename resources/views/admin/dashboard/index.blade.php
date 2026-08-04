@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row g-3 mb-3">
    @php
        $cards = [
            ['label' => 'Total Menu', 'value' => $stats['menu'], 'icon' => 'bi-egg-fried', 'color' => '#3E5F2B'],
            ['label' => 'Total Reservasi', 'value' => $stats['reservasi'], 'icon' => 'bi-calendar-check', 'color' => '#E06A4B'],
            ['label' => 'Total Artikel', 'value' => $stats['artikel'], 'icon' => 'bi-newspaper', 'color' => '#2E4720'],
            ['label' => 'Total Promo', 'value' => $stats['promo'], 'icon' => 'bi-percent', 'color' => '#E06A4B'],
            ['label' => 'Total Testimoni', 'value' => $stats['testimoni'], 'icon' => 'bi-chat-quote', 'color' => '#3E5F2B'],
        ];
    @endphp
    @foreach ($cards as $card)
        <div class="col-6 col-md-4 col-xl-2dot4" style="flex: 0 0 20%; max-width: 20%;">
            <div class="card card-stat p-3 h-100">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box" style="background: {{ $card['color'] }};"><i class="bi {{ $card['icon'] }}"></i></div>
                    <div>
                        <div class="fs-4 fw-bold" style="color: var(--dark-olive);">{{ $card['value'] }}</div>
                        <div class="text-muted small">{{ $card['label'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row g-3">
    <div class="col-lg-7">
        <div class="card p-3">
            <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Grafik Reservasi Tahun Ini</h6>
            <canvas id="reservationChart" height="120"></canvas>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card p-3">
            <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Reservasi Terbaru</h6>
            @forelse ($latestReservations as $r)
                <div class="d-flex justify-content-between border-bottom py-2">
                    <div>
                        <div class="fw-semibold">{{ $r->name }}</div>
                        <div class="text-muted small">{{ $r->date->format('d M Y') }} - {{ $r->guests }} orang</div>
                    </div>
                    <span class="badge bg-{{ $r->status === 'confirmed' ? 'success' : ($r->status === 'cancelled' ? 'danger' : 'warning') }} align-self-center">{{ ucfirst($r->status) }}</span>
                </div>
            @empty
                <p class="text-muted mb-0">Belum ada reservasi.</p>
            @endforelse
        </div>
    </div>
</div>

@push('scripts')
<script>
    new Chart(document.getElementById('reservationChart'), {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
            datasets: [{
                label: 'Jumlah Reservasi',
                data: @json($chartData),
                borderColor: '#E06A4B',
                backgroundColor: 'rgba(224,106,75,0.15)',
                tension: 0.35,
                fill: true,
            }]
        },
        options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
    });
</script>
@endpush
@endsection
