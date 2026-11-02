@extends('layouts.app')
@section('title', 'Catégories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Catégories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Ajouter
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th class="text-end">Produits</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td class="text-end">{{ $category->products_count ?? $category->products()->count() }}</td>
                            <td class="text-end text-nowrap">
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Supprimer cette catégorie ?')">
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
                            <td colspan="3" class="text-center text-muted py-4">Aucune catégorie.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection