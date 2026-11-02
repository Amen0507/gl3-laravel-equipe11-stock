@php $product = $product ?? null; @endphp

<div class="row g-3">
    <div class="col-12 col-md-8">
        <label for="name" class="form-label">Nom du produit</label>
        <input type="text" id="name" name="name"
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $product->name ?? '') }}">
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12 col-md-4">
        <label for="category_id" class="form-label">Catégorie</label>
        <select id="category_id" name="category_id"
                class="form-select @error('category_id') is-invalid @enderror">
            <option value="">Choisir...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12 col-md-4">
        <label for="price" class="form-label">Prix (FCFA)</label>
        <input type="number" step="0.01" min="0" id="price" name="price"
               class="form-control @error('price') is-invalid @enderror"
               value="{{ old('price', $product->price ?? '') }}">
        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12 col-md-4">
        <label for="quantity" class="form-label">Quantité</label>
        <input type="number" min="0" id="quantity" name="quantity"
               class="form-control @error('quantity') is-invalid @enderror"
               value="{{ old('quantity', $product->quantity ?? 0) }}">
        @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12 col-md-4">
        <label for="low_stock_threshold" class="form-label">Seuil d'alerte</label>
        <input type="number" min="0" id="low_stock_threshold" name="low_stock_threshold"
               class="form-control @error('low_stock_threshold') is-invalid @enderror"
               value="{{ old('low_stock_threshold', $product->low_stock_threshold ?? 5) }}">
        @error('low_stock_threshold')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" rows="3"
                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>