@extends('layouts.app')
@section('title', 'Modifier la catégorie')

@section('content')
    <h1 class="h3 mb-3">Modifier : {{ $category->name }}</h1>
    <form method="POST" action="{{ route('categories.update', $category) }}" class="card card-body shadow-sm">
        @csrf
        @method('PUT')
        @include('categories._form')
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg me-1"></i>Mettre à jour
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Annuler</a>
        </div>
    </form>
@endsection