<div class="mb-3">
    <label for="InputSlug" class="form-label">Cимвольный код статьи</label>
    <input type="text"
           class="form-control"
           id="InputSlug"
           name="slug"
           value="{{ old('slug', $article->slug ?? "") }}"
    >
</div>
<div class="mb-3">
    <label for="InputName" class="form-label">Название статьи</label>
    <input type="text"
           class="form-control"
           id="InputName"
           name="name"
           value="{{ old('name', $article->name ?? "") }}"
    >
</div>
<div class="mb-3">
    <label for="TextareaShortDescription" class="form-label">Краткое описание</label>
    <textarea class="form-control"
              id="TextareaShortDescription"
              name="short-description"
              rows="3">{{ old('short-description', $article->short_description ?? "") }}</textarea>
</div>
<div class="mb-3">
    <label for="TextareaDescription" class="form-label">Детальное описание</label>
    <textarea class="form-control"
              id="TextareaDescription"
              name="description"
              rows="5">{{ old('description', $article->description ?? "") }}</textarea>
</div>
<div class="mb-3 form-check">
    <input type="checkbox"
           class="form-check-input"
           id="CheckPublished"
           name="published"
           @if (isset($article->published))
               {{ $article->published ? 'checked' : '' }}
           @endif
    >
    <label class="form-check-label" for="CheckPublished">Опубликовано</label>
</div>
