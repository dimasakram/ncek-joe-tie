<div class="mb-3">
    <label class="form-label">Nama Kategori</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
    @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Slug (opsional, otomatis dari nama)</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Icon (bootstrap-icons class, opsional)</label>
    <input type="text" name="icon" class="form-control" placeholder="bi-cup-hot" value="{{ old('icon', $category->icon ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Urutan Tampil</label>
    <input type="number" name="order" class="form-control" value="{{ old('order', $category->order ?? 0) }}">
</div>
