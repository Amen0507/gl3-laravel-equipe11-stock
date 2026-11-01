<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Les 6 catégories de la boutique
        $categories = [
            'Épicerie & Céréales' => [
                ['name' => 'Riz parfumé 5kg', 'quantity' => 12, 'price' => 5500, 'threshold' => 5, 'desc' => 'Sac de riz parfumé 5kg'],
                ['name' => 'Riz local 1kg', 'quantity' => 3, 'price' => 900, 'threshold' => 5, 'desc' => 'Riz blanc produit localement (Stock faible)'],
                ['name' => 'Pâtes Spaghetti 500g', 'quantity' => 28, 'price' => 450, 'threshold' => 6, 'desc' => 'Pâtes alimentaires de blé dur'],
                ['name' => 'Sucre en morceaux 1kg', 'quantity' => 2, 'price' => 1000, 'threshold' => 5, 'desc' => 'Paquet de sucre en morceaux (Stock faible)'],
                ['name' => 'Boîte de sardines à l\'huile', 'quantity' => 20, 'price' => 500, 'threshold' => 5, 'desc' => 'Sardines à l\'huile végétale 125g'],
                ['name' => 'Farine de blé 1kg', 'quantity' => 15, 'price' => 850, 'threshold' => 4, 'desc' => 'Farine ménagère tout usage'],
            ],
            'Huiles & Condiments' => [
                ['name' => 'Huile végétale 1L', 'quantity' => 4, 'price' => 1200, 'threshold' => 5, 'desc' => 'Bouteille d\'huile de tournesol (Stock faible)'],
                ['name' => 'Huile de palme raffinée 1.5L', 'quantity' => 14, 'price' => 1600, 'threshold' => 5, 'desc' => 'Huile rouge filtrée de qualité'],
                ['name' => 'Tomate concentrée 70g', 'quantity' => 40, 'price' => 150, 'threshold' => 10, 'desc' => 'Boîte de purée de tomate'],
                ['name' => 'Cube d\'assaisonnement (tablette)', 'quantity' => 80, 'price' => 50, 'threshold' => 20, 'desc' => 'Cube d\'assaisonnement culinaire'],
                ['name' => 'Vinaigre blanc 1L', 'quantity' => 8, 'price' => 700, 'threshold' => 3, 'desc' => 'Bouteille de vinaigre cristal'],
                ['name' => 'Sel iodé 500g', 'quantity' => 25, 'price' => 200, 'threshold' => 5, 'desc' => 'Sachet de sel fin de cuisine'],
            ],
            'Boissons & Produits laitiers' => [
                ['name' => 'Eau minérale Possotomè 1.5L', 'quantity' => 36, 'price' => 400, 'threshold' => 8, 'desc' => 'Pack d\'eau minérale naturelle'],
                ['name' => 'Lait concentré sucré Bonnet Rouge', 'quantity' => 3, 'price' => 800, 'threshold' => 5, 'desc' => 'Boîte 397g (Stock faible)'],
                ['name' => 'Lait en poudre Nido 400g', 'quantity' => 10, 'price' => 2600, 'threshold' => 4, 'desc' => 'Boîte de lait en poudre instantané'],
                ['name' => 'Canette Coca-Cola 33cl', 'quantity' => 2, 'price' => 500, 'threshold' => 6, 'desc' => 'Boisson gazeuse fraîche (Stock faible)'],
                ['name' => 'Jus de fruits Sobebra 33cl', 'quantity' => 18, 'price' => 450, 'threshold' => 5, 'desc' => 'Jus d\'ananas local'],
            ],
            'Hygiène & Entretien' => [
                ['name' => 'Savon BF (morceau)', 'quantity' => 35, 'price' => 250, 'threshold' => 8, 'desc' => 'Savon de lessive traditionnel'],
                ['name' => 'Savon de toilette Lux', 'quantity' => 4, 'price' => 400, 'threshold' => 5, 'desc' => 'Pain de toilette parfumé (Stock faible)'],
                ['name' => 'Lessive en poudre Omo 500g', 'quantity' => 16, 'price' => 700, 'threshold' => 4, 'desc' => 'Poudre nettoyante multi-usages'],
                ['name' => 'Eau de javel 1L', 'quantity' => 11, 'price' => 600, 'threshold' => 3, 'desc' => 'Désinfectant ménager'],
                ['name' => 'Dentifrice Colgate 100ml', 'quantity' => 2, 'price' => 750, 'threshold' => 4, 'desc' => 'Dentifrice au fluor (Stock faible)'],
            ],
            'Papeterie & Fournitures' => [
                ['name' => 'Cahier 100 pages TP', 'quantity' => 45, 'price' => 350, 'threshold' => 10, 'desc' => 'Cahier petits carreaux format scolaire'],
                ['name' => 'Cahier 200 pages', 'quantity' => 2, 'price' => 600, 'threshold' => 5, 'desc' => 'Grand cahier scolaire (Stock faible)'],
                ['name' => 'Stylo à bille Bic bleu', 'quantity' => 120, 'price' => 100, 'threshold' => 20, 'desc' => 'Stylo bleu à pointe moyenne'],
                ['name' => 'Boîte de crayons de couleur', 'quantity' => 8, 'price' => 1200, 'threshold' => 3, 'desc' => 'Boîte de 12 crayons'],
                ['name' => 'Gomme blanche', 'quantity' => 22, 'price' => 150, 'threshold' => 5, 'desc' => 'Gomme pour crayon à papier'],
            ],
            'Biscuits & Confiserie' => [
                ['name' => 'Paquet de biscuits Petit Beurre', 'quantity' => 24, 'price' => 300, 'threshold' => 6, 'desc' => 'Biscuits secs pour le goûter'],
                ['name' => 'Chocolat en poudre Nesquik 250g', 'quantity' => 5, 'price' => 1800, 'threshold' => 3, 'desc' => 'Poudre cacaotée instantanée'],
                ['name' => 'Bonbons menthe (sachet)', 'quantity' => 1, 'price' => 500, 'threshold' => 5, 'desc' => 'Sachet de bonbons rafraîchissants (Stock faible)'],
            ],
        ];
        // 2. Insertion en base de données
        foreach ($categories as $categoryName => $products) {
            $category = Category::create([
                'name' => $categoryName,
            ]);
            foreach ($products as $productData) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $productData['name'],
                    'quantity' => $productData['quantity'],
                    'price' => $productData['price'],
                    'low_stock_threshold' => $productData['threshold'],
                    'description' => $productData['desc'],
                ]);
            }
        }
    }
}
