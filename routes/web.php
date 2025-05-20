<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MarquesController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;




Route::middleware(['auth'])->prefix('client')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::get('/sous-category/{id}', [ClientController::class, 'showCategory'])->name('client.category');
});

Route::middleware(['auth'])->prefix('products')->group(function () {
    Route::get('/', [ProduitController::class, 'index'])->name('products.index');
    Route::get('/create', [ProduitController::class, 'create'])->name('products.create');
    Route::post('/', [ProduitController::class, 'store'])->name('products.store');
    Route::get('/{produit}/edit', [ProduitController::class, 'edit'])->name('products.edit');
    Route::put('/{produit}', [ProduitController::class, 'update'])->name('products.update');
    Route::delete('/{produit}', [ProduitController::class, 'destroy'])->name('products.destroy');
    Route::get('/produit/{id}', [ProduitController::class, 'show'])->name('products.show');
  

});
Route::middleware('auth')->prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('/', 'index')->name('cart.index'); // Afficher le panier
    Route::post('/add/{product}', 'add')->name('cart.add'); // Ajouter un produit au panier
    Route::patch('/update/{cart}', 'update')->name('cart.update'); // Modifier la quantité
    Route::delete('/remove/{cart}', 'remove')->name('cart.remove'); // Supprimer un article
});

Route::middleware('auth')->prefix('orders')->group(function() {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index'); // Afficher les commandes
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/', [OrderController::class, 'store'])->name('orders.store'); // Créer une commande
    Route::put('/{id}', [OrderController::class, 'update'])->name('orders.update'); // Mettre à jour une commande
    Route::delete('/{id}', [OrderController::class, 'destroy'])->name('orders.destroy'); // Supprimer une commande
    Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');

});


Route::middleware(['auth'])->prefix('category')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('category.update'); 
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('category.show');
    

   
   

});


Route::middleware(['auth'])->prefix('marques')->group(function() {
    Route::get('/', [MarquesController::class, 'index'])->name('brands.index');
    Route::get('/create', [MarquesController::class, 'create'])->name('brands.create'); 
    Route::post('/store', [MarquesController::class, 'store'])->name('brands.store');
    Route::get('/{id}/edit', [MarquesController::class, 'edit'])->name('brands.edit');
    Route::put('/{id}', [MarquesController::class, 'update'])->name('brands.update');
    Route::delete('/{id}', [MarquesController::class, 'destroy'])->name('brands.destroy');
});


// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Tableau de bord (dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes protégées (authentification requise)
Route::middleware(['auth'])->group(function () {
    
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Marques
    
});
Route::get('/create',function(){
    return view('create');
});
    

// Auth routes
require __DIR__.'/auth.php';
