@extends('layouts.app')
@section('title', 'Nouveau produit')

@section('content')
    <h1 class="h3 mb-3">Nouveau produit</h1>
    <form method="POST" action="{{ route('products.store') }}" class="card card-body shadow-sm">
        @csrf
        @include('products._form')
        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg me-1"></i>Enregistrer
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Annuler</a>
        </div>
    </form>
@endsection