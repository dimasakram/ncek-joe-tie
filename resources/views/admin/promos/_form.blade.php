<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Judul Promo</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $promo->title ?? '') }}" required>
        @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Menu Terkait (opsional)</label>
        <select name="menu_id" class="form-select">
            <option value="">-- Tidak terikat menu --</option>
            @foreach ($menus as $m)
                <option value="{{ $m->id }}" {{ old('menu_id', $promo->menu_id ?? '') == $m->id ? 'selected' : '' }}>{{ $m->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $promo->description ?? '') }}</textarea>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Diskon (%)</label>
        <input type="number" name="discount_percent" class="form-control" value="{{ old('discount_percent', $promo->discount_percent ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Tanggal Mulai</label>
        <input type="date" name="start_date" class="form-control" value="{{ old('start_date', isset($promo) ? $promo->start_date->format('Y-m-d') : '') }}" required>
        @error('start_date')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Tanggal Selesai</label>
        <input type="date" name="end_date" class="form-control" value="{{ old('end_date', isset($promo) ? $promo->end_date->format('Y-m-d') : '') }}" required>
        @error('end_date')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Gambar Promo</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($promo) && $promo->image_url)
        <img src="{{ $promo->image_url }}" width="60" class="mt-2 rounded">
    @endif
</div>
<div class="form-check mb-3">
    <input type="checkbox" name="is_active" value="1" class="form-check-input" id="active" {{ old('is_active', $promo->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="active">Aktifkan Promo</label>
</div>