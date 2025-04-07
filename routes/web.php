<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarquesController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
Route::middleware(['auth'])->prefix('category')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('category.index'); 
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create'); 
    Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit',[CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/',[CategoryController::class, 'update'])->name('category.update');


});


Route::middleware(['auth'])->prefix('marques')->group(function() {
    Route::get('/', [MarquesController::class, 'index'])->name('marques.index');
    Route::get('/create', [MarquesController::class, 'create'])->name('marques.create'); 
    Route::post('/store', [MarquesController::class, 'store'])->name('marques.store');
    Route::get('/{id}/edit', [MarquesController::class, 'edit'])->name('marques.edit');
    Route::put('/{id}', [MarquesController::class, 'update'])->name('marques.update');
    Route::delete('/{id}', [MarquesController::class, 'destroy'])->name('marques.destroy');
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
