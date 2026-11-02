@php $category = $category ?? null; @endphp

<div class="mb-3">
    <label for="name" class="form-label">Nom de la catégorie</label>
    <input type="text" id="name" name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $category->name ?? '') }}" autofocus>
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>