<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalProducts = Product::count();
        $stockValue = Product::sum(DB::raw('quantity *price')) ?? 0;
        $lowStockCount = Product::lowStock()->count();
        $lowStockProducts = Product::with('category')->lowStock()->get();

        return view('dashboard', compact(
            'totalProducts',
            'stockValue',
            'lowStockCount',
            'lowStockProducts'
        ));
    }
}
