<div class="mb-3">
    <label class="form-label">Judul Foto</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title ?? '') }}" required>
    @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Kategori</label>
    <select name="category" class="form-select" required>
        @foreach (['makanan' => 'Makanan', 'interior' => 'Interior', 'event' => 'Event'] as $val => $label)
            <option value="{{ $val }}" {{ old('category', $gallery->category ?? '') == $val ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Foto</label>
    <input type="file" name="image" class="form-control">
    @error('image')<div class="text-danger small">{{ $message }}</div>@enderror
    @if (!empty($gallery) && $gallery->image)
        <img src="{{ asset('storage/'.$gallery->image) }}" width="80" class="mt-2 rounded">
    @endif
</div>
<div class="mb-3">
    <label class="form-label">Urutan Tampil</label>
    <input type="number" name="order" class="form-control" value="{{ old('order', $gallery->order ?? 0) }}">
</div>
