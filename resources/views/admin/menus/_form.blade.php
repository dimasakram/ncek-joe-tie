<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Nama Menu</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $menu->name ?? '') }}" required>
        @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Kategori</label>
        <select name="category_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $menu->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Slug (opsional)</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug', $menu->slug ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $menu->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Komposisi</label>
    <textarea name="composition" class="form-control" rows="2">{{ old('composition', $menu->composition ?? '') }}</textarea>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Harga (Rp)</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $menu->price ?? '') }}" required>
        @error('price')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Foto Menu</label>
        <input type="file" name="image" class="form-control">
        @if (!empty($menu) && $menu->image)
            <img src="{{ asset('storage/'.$menu->image) }}" width="60" class="mt-2 rounded">
        @endif
    </div>
</div>
<div class="d-flex gap-4 mb-3">
    <div class="form-check">
        <input type="checkbox" name="is_best_seller" value="1" class="form-check-input" id="best" {{ old('is_best_seller', $menu->is_best_seller ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="best">Best Seller</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="is_new" value="1" class="form-check-input" id="new" {{ old('is_new', $menu->is_new ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="new">New</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="is_available" value="1" class="form-check-input" id="avail" {{ old('is_available', $menu->is_available ?? true) ? 'checked' : '' }}>
        <label class="form-check-label" for="avail">Tersedia</label>
    </div>
</div>
