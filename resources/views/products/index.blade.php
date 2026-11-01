@extends('layouts.app')
@section('title', 'Produits')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Produits</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Ajouter
        </a>
    </div>

    <form method="GET" action="{{ route('products.index') }}" class="card card-body shadow-sm mb-3">
        <div class="row g-2 align-items-end">
            <div class="col-12 col-md-4">
                <label class="form-label small mb-1" for="search">Recherche</label>
                <input type="text" id="search" name="search" class="form-control"
                       placeholder="Nom ou description" value="{{ request('search') }}">
            </div>
            <div class="col-12 col-md-3">
                <label class="form-label small mb-1" for="category">Catégorie</label>
                <select id="category" name="category" class="form-select">
                    <option value="">Toutes</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="low_stock" name="low_stock"
                           value="1" @checked(request('low_stock'))>
                    <label class="form-check-label" for="low_stock">Stock faible</label>
                </div>
            </div>
            <div class="col-12 col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-dark flex-fill">
                    <i class="bi bi-search me-1"></i>Filtrer
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Produit</th>
                        <th>Catégorie</th>
                        <th class="text-end">Prix</th>
                        <th class="text-end">Quantité</th>
                        <th>État</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>
                                <a href="{{ route('products.show', $product) }}" class="text-decoration-none fw-semibold">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td class="text-end">{{ number_format($product->price, 0, ',', ' ') }} FCFA</td>
                            <td class="text-end">{{ $product->quantity }}</td>
                            <td>
                                @if ($product->quantity <= $product->low_stock_threshold)
                                    <span class="badge text-bg-danger">Stock faible</span>
                                @else
                                    <span class="badge text-bg-success">Disponible</span>
                                @endif
                            </td>
                            <td class="text-end text-nowrap">
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Supprimer ce produit ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Aucun produit trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
@endsection