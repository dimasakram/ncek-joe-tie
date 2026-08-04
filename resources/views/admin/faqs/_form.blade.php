<div class="mb-3">
    <label class="form-label">Pertanyaan</label>
    <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question ?? '') }}" required>
    @error('question')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Jawaban</label>
    <textarea name="answer" class="form-control" rows="4" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
    @error('answer')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Urutan Tampil</label>
    <input type="number" name="order" class="form-control" value="{{ old('order', $faq->order ?? 0) }}">
</div>
<div class="form-check mb-3">
    <input type="checkbox" name="is_active" value="1" class="form-check-input" id="active" {{ old('is_active', $faq->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="active">Tampilkan FAQ ini</label>
</div>
