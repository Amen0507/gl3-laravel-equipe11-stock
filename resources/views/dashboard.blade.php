@extends('layouts.app')
@section('title', 'Tableau de bord')

@section('content')
    <h1 class="h3 mb-4">Tableau de bord</h1>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-boxes fs-1 text-primary me-3"></i>
                    <div>
                        <div class="text-muted small">Produits</div>
                        <div class="fs-3 fw-bold">{{ $totalProducts }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-cash-stack fs-1 text-success me-3"></i>
                    <div>
                        <div class="text-muted small">Valeur du stock</div>
                        <div class="fs-3 fw-bold">{{ number_format($stockValue, 0, ',', ' ') }} FCFA</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle fs-1 text-danger me-3"></i>
                    <div>
                        <div class="text-muted small">Alertes stock faible</div>
                        <div class="fs-3 fw-bold">{{ $lowStockCount }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">
            <i class="bi bi-exclamation-circle me-2"></i>Produits à réapprovisionner
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Produit</th>
                        <th>Catégorie</th>
                        <th class="text-end">Quantité</th>
                        <th class="text-end">Seuil</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lowStockProducts as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td class="text-end text-danger fw-bold">{{ $product->quantity }}</td>
                            <td class="text-end">{{ $product->low_stock_threshold }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Aucun produit en stock faible.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection