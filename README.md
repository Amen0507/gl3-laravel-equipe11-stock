# IFRI - UAC | Projet d'initiation aux frameworks (GL 3)
## Sujet C : Suivi de stock d'une petite boutique

Application web de gestion et de suivi de stock pour une petite boutique de quartier, développée avec le framework **Laravel 13**.

---

### 👥 Équipe 11 & Répartition des tâches

* **Jean-Jonas Amen J. GOUSSANOU** — **Back-end & Base de données** :
  - Conception de la base de données, migrations et clés étrangères (`restrictOnDelete`)
  - Modèles Eloquent, relations (`hasMany`, `belongsTo`) et Scopes de recherche/filtrage
  - Contrôleurs (`DashboardController`, `ProductController`, `CategoryController`)
  - FormRequests et validations en français (`StoreProductRequest`, `UpdateProductRequest`)
  - Seeders réalistes (produits et catégories d'une boutique béninoise)

* **Djlado Koffi Ulrich AHIDAZAN** — **Front-end & Authentification** :
  - Intégration du Layout Blade commun responsive (Bootstrap 5 & Bootstrap Icons)
  - Vues du tableau de bord, des listes, des détails et des formulaires
  - Authentification (`AuthController`, sessions, middleware `auth`)
  - Composants d'alertes et messages flash de succès/erreur

---

### 🚀 Fonctionnalités réalisées

1. **Tableau de bord (Dashboard) :**
   - Indicateurs en temps réel : nombre total de références, valeur financière globale du stock (en FCFA), nombre d'alertes de stock faible.
   - Tableau dynamique des produits en alerte critique (`quantité <= seuil d'alerte`).

2. **Gestion des produits (CRUD complet) :**
   - Liste paginée (10 par page) avec conservation des filtres (`withQueryString()`).
   - Recherche multi-critères par nom ou description.
   - Filtre par catégorie et filtre rapide « Stock faible ».
   - Création, modification et consultation détaillée d'un produit.
   - Suppression sécurisée avec message flash de confirmation.

3. **Gestion des catégories (CRUD) :**
   - Liste des catégories avec décompte automatique du nombre de produits associés (`withCount`).
   - Protection à la suppression : interdiction stricte de supprimer une catégorie contenant encore des produits (`restrictOnDelete`) avec message d'erreur explicite.

4. **Sécurité et validations :**
   - Authentification sécurisée par session (Connexion, Déconnexion), réservée à l'administrateur : aucune inscription publique, le compte est créé par le seeder.
   - Validations robustes via FormRequests avec messages d'erreurs.
   - Protection contre les injections SQL et les failles CSRF sur tous les formulaires.

---

### 🛠️ Choix techniques

* **Framework :** Laravel (compatible PHP 8.3+)
* **Base de données :** MySQL / MariaDB (moteur de stockage InnoDB pour éviter l'erreur 1071)
* **ORM :** Eloquent avec Scopes locaux (`scopeSearch`, `scopeInCategory`, `scopeLowStock`) et Eager Loading (`with('category')`) pour éliminer le problème N+1
* **Front-end :** Moteur de templates Blade, Bootstrap 5, Bootstrap Icons

---

### 💻 Instructions d'installation et de lancement

#### 1. Cloner le projet et installer les dépendances
```bash
git clone https://github.com/Amen0507/gl3-laravel-equipe11-stock.git
cd gl3-laravel-equipe11-stock
composer install
```

#### 2. Configuration de l'environnement
```bash
cp .env.example .env
php artisan key:generate
```

Dans le fichier `.env`, remplacer les lignes `DB_*` existantes (le `.env.example` utilise SQLite par défaut) par :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stock_boutique
DB_USERNAME=root
DB_PASSWORD=votre_mot_de_passe
```

#### 3. Base de données et données de test
Créer la base de données dans MySQL/MariaDB (`CREATE DATABASE stock_boutique;`), puis exécuter :
```bash
php artisan migrate --seed
```

#### 4. Lancer le serveur local
```bash
php artisan serve
```
L'application est accessible à l'adresse : [http://127.0.0.1:8000](http://127.0.0.1:8000)

#### 🔑 Identifiants du compte administrateur de test :
* **Email :** `admin@boutique.test`
* **Mot de passe :** `password123`

> Il n'existe volontairement aucune page d'inscription : l'application est une interface d'administration, seul ce compte donne accès aux données.
