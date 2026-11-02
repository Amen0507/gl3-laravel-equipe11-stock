<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Liste des produits avec recherche, filtre et pagination.
     */
    public function index(Request $request): View
    {
        $products = Product::with('category')
            ->search($request->input('search'))
            ->inCategory($request->input('category'))
            ->when($request->filled('low_stock'), function ($query) {
                $query->lowStock();
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view('products.index', compact('products', 'categories'));

    }

    /**
     * Formulaire de création d'un produit
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('products.create', compact('categories'));
    }

    /**
     * Enregistrement en base de données
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        Product::create($request->validates());

        return redirect()
            ->route('products.index')
            ->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Détails d'un produit
     */
    public function show(string $id)
    {
        $product->load('category');

        return view('products.show', compact('product'));
    }

    /**
     * Formulaire d'édition d'un produit
     */
    public function edit(string $id)
    {
        $categories = Categories::orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Mise à jour du produit dans la bdd
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());
        
        return redirect()
            ->route('products.index')
            ->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            -with('success', 'Produit supprimé avec succès.');
    }
}
