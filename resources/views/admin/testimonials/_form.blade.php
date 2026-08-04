<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Nama Pelanggan</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name ?? '') }}" required>
        @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Rating (1-5)</label>
        <input type="number" name="rating" min="1" max="5" class="form-control" value="{{ old('rating', $testimonial->rating ?? 5) }}" required>
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Pesan Testimoni</label>
    <textarea name="message" class="form-control" rows="3" required>{{ old('message', $testimonial->message ?? '') }}</textarea>
    @error('message')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Foto (opsional)</label>
    <input type="file" name="photo" class="form-control">
    @if (!empty($testimonial) && $testimonial->photo)
        <img src="{{ asset('storage/'.$testimonial->photo) }}" width="60" class="mt-2 rounded-circle">
    @endif
</div>
<div class="form-check mb-3">
    <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="feat" {{ old('is_featured', $testimonial->is_featured ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="feat">Tampilkan di Halaman Home</label>
</div>
