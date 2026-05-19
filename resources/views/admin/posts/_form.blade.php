@csrf
<div class="stack" style="display:grid;gap:1rem;">
    <div class="grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1rem;">
        <label style="grid-column:1/-1;">
            <span>Title</span>
            <input type="text" name="title" id="post-title" value="{{ old('title', $post->title ?? '') }}" required>
        </label>
        <label>
            <span>Slug <span style="font-weight:400;color:var(--muted);">(auto-generated if empty)</span></span>
            <input type="text" name="slug" id="post-slug" value="{{ old('slug', $post->slug ?? '') }}" placeholder="my-post-slug">
        </label>
        <label>
            <span>Category</span>
            <input type="text" name="category" value="{{ old('category', $post->category ?? '') }}" placeholder="e.g. AI, News, Tutorial">
        </label>
        <label>
            <span>Status</span>
            <select name="status" style="width:100%;border:1px solid rgba(15,23,42,0.15);border-radius:0.9rem;padding:0.85rem 1rem;font-size:1rem;background:var(--bg);">
                <option value="draft" {{ old('status', $post->status ?? 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="publish" {{ old('status', $post->status ?? '') === 'publish' ? 'selected' : '' }}>Published</option>
            </select>
        </label>
        <label>
            <span>Published at <span style="font-weight:400;color:var(--muted);">(set when publishing)</span></span>
            <input type="datetime-local" name="published_at" value="{{ old('published_at', isset($post->published_at) ? $post->published_at?->format('Y-m-d\TH:i') : '') }}">
        </label>
    </div>

    <label>
        <span>Excerpt <span style="font-weight:400;color:var(--muted);">(optional — shown in listings)</span></span>
        <textarea name="excerpt" rows="3" style="width:100%;border:1px solid rgba(15,23,42,0.15);border-radius:0.9rem;padding:0.85rem 1rem;font-size:1rem;">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    </label>

    <label>
        <span>Content</span>
        <textarea name="content" id="post-content" rows="18" style="width:100%;border:1px solid rgba(15,23,42,0.15);border-radius:0.9rem;padding:0.85rem 1rem;font-size:1rem;font-family:monospace;line-height:1.6;">{{ old('content', $post->content ?? '') }}</textarea>
    </label>
</div>

<div style="margin-top:1.5rem;display:flex;gap:1rem;flex-wrap:wrap;">
    <button type="submit">{{ $submitLabel }}</button>
    <a class="link" href="{{ route('admin.posts.index') }}" style="display:inline-flex;align-items:center;padding:0.65rem 1rem;border:1px solid rgba(15,23,42,0.12);border-radius:0.9rem;background:#fff;box-shadow:0 6px 18px rgba(15,23,42,0.08);">Cancel</a>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var titleEl = document.getElementById('post-title');
    var slugEl  = document.getElementById('post-slug');
    if (!titleEl || !slugEl) return;

    var slugEdited = slugEl.value.length > 0;
    slugEl.addEventListener('input', function () { slugEdited = true; });

    titleEl.addEventListener('input', function () {
        if (slugEdited) return;
        slugEl.value = titleEl.value
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');
    });
});
</script>
@endpush
