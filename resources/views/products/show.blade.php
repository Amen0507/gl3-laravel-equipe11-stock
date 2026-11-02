@extends('layouts.app')
@section('title', $product->name)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">{{ $product->name }}</h1>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>Retour
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Catégorie</dt>
                <dd class="col-sm-9">{{ $product->category->name }}</dd>
                <dt class="col-sm-3">Prix</dt>
                <dd class="col-sm-9">{{ number_format($product->price, 0, ',', ' ') }} FCFA</dd>
                <dt class="col-sm-3">Quantité</dt>
                <dd class="col-sm-9">{{ $product->quantity }}</dd>
                <dt class="col-sm-3">Seuil d'alerte</dt>
                <dd class="col-sm-9">{{ $product->low_stock_threshold }}</dd>
                <dt class="col-sm-3">État</dt>
                <dd class="col-sm-9">
                    @if ($product->quantity <= $product->low_stock_threshold)
                        <span class="badge text-bg-danger">Stock faible</span>
                    @else
                        <span class="badge text-bg-success">Disponible</span>
                    @endif
                </dd>
                <dt class="col-sm-3">Description</dt>
                <dd class="col-sm-9">{{ $product->description ?: 'Aucune description.' }}</dd>
            </dl>
        </div>
    </div>
@endsection