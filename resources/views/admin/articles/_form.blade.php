<div class="mb-3">
    <label class="form-label">Judul Artikel</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $article->title ?? '') }}" required>
    @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Slug (opsional)</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug', $article->slug ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Ringkasan Singkat</label>
    <input type="text" name="excerpt" class="form-control" value="{{ old('excerpt', $article->excerpt ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Isi Artikel</label>
    <textarea name="content" class="form-control" rows="8" required>{{ old('content', $article->content ?? '') }}</textarea>
    @error('content')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Gambar Sampul</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($article) && $article->image)
        <img src="{{ asset('storage/'.$article->image) }}" width="80" class="mt-2 rounded">
    @endif
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Meta Title (SEO)</label>
        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $article->meta_title ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Meta Description (SEO)</label>
        <input type="text" name="meta_description" class="form-control" value="{{ old('meta_description', $article->meta_description ?? '') }}">
    </div>
</div>
<div class="form-check mb-3">
    <input type="checkbox" name="is_published" value="1" class="form-check-input" id="pub" {{ old('is_published', $article->is_published ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="pub">Publikasikan Sekarang</label>
</div>
