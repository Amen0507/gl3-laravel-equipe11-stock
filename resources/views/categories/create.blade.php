@extends('layouts.app')
@section('title', 'Nouvelle catégorie')

@section('content')
    <h1 class="h3 mb-3">Nouvelle catégorie</h1>
    <form method="POST" action="{{ route('categories.store') }}" class="card card-body shadow-sm">
        @csrf
        @include('categories._form')
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg me-1"></i>Enregistrer
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Annuler</a>
        </div>
    </form>
@endsection