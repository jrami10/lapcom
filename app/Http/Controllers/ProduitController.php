<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProduitController extends Controller
{
    // Afficher la liste des produits
    public function index()
    {
        $produits = Product::all();  // Récupérer tous les produits
        return view('products.index', compact('produits'));  // Passer les produits à la vue
    }

    // Afficher le formulaire de création d'un produit
    public function create()
    {
        $categories = Category::all();  // Récupérer toutes les catégories
        $marques = Brand::all();  // Récupérer toutes les marques
        return view('products.create', compact('categories', 'marques'));  // Passer les données à la vue
    }

    // Stocker un produit
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string',
            'resume' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'promo' => 'nullable|numeric|min:0',
            'state' => 'required|in:disponible,outofstock,soon',
            'idCategory' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'idUser' => 'required|exists:users,id',
        ]);
    
        // Gestion de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }
    
        // Création du produit
        Product::create($validated);
    
        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès.');
    }

    // Afficher un produit spécifique
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    
    // Afficher le formulaire d'édition d'un produit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
    
        return view('products.edit', compact('product', 'categories'));
    }
    // Mettre à jour un produit
    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
        'description' => 'nullable|string',
        'resume' => 'nullable|string',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'promo' => 'nullable|numeric|min:0',
        'state' => 'required|in:disponible,outofstock,soon',
        'idCategory' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // Supprimer l’ancienne image si elle existe
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $validated['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($validated);

    return redirect()->route('products.index')->with('success', 'Produit modifié avec succès.');
}

    // Supprimer un produit
    public function destroy(Product $produit)
    {
        $produit->delete();  // Supprimer le produit
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
    
}
