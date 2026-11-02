<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'quantity',
        'price',
        'low_stock_threshold',
        'description',
    ];

    /**
     * Un produit appartient à une catégorie
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope pour rechercher par nom ou description 
     */
    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        return $query->when($search, function($q, $search){
            $q->where(function ($sub) use ($search){
                $sub->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }); 
    } 

    /**
     * Scope pour filter par catégorie
     */
    public function scopeInCategory(Builder $query, ?int $categoryId): Builder
    {
        return $query->when($categoryId, function ($q, $categoryId){
            $q->where('category_id', $categoryId);
        });
    }

    /**
     * Scope pour filtrer les produits en alerte stock faible
     * Condition : quantity <= low_stock_threshold
     */
    public function scopeLowStock(Builder $query): Builder
    {
        return $query->whereColumn('quantity', '<=', 'low_stock_threshold');
    }
}
