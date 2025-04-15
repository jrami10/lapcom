<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Marque;
use App\Models\Product;

class MarquesController extends Controller
{
    // Afficher la liste des marques
    public function index()
    {
        $brands = Brand::all();  // Récupère toutes les marques dans la base de données
        return view('brands.index', compact('brands'));  // Renvoie la vue avec les marques
    }

    // Afficher le formulaire pour ajouter une nouvelle marque
    public function create()
    {
        $products = Product::all(); // Récupère tous les produits pour le formulaire
        return view('brands.create', compact('products')); // Renvoie la vue avec les produits
        
    }

    // Enregistrer une nouvelle marque dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'statut' => 'required|in:actif,inactif',
            'idProduct' => 'required|exists:products,id',
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brands', 'public');
        }
    
        Brand::create([
            'title' => $request->title,
            'image' => $imagePath,
            'statut' => $request->statut,
            'idProduct' => $request->idProduct,
        ]);
    
        return redirect()->route('brands.index')->with('success', 'Marque ajoutée avec succès.');
    }
    
    public function edit($id)
{
    $brand = Brand::findOrFail($id);
    $products = Product::all(); // Récupère tous les produits pour le formulaire
    
    return view('brands.edit', compact('brand', 'products')); // Renvoie la vue avec la marque à modifier et les produits
}
public function update(Request $request, $id)
{
    $brand = Brand::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'statut' => 'required|in:actif,inactif',
        'idProduct' => 'required|exists:products,id',
    ]);

    // Gestion de l'image
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('brands', 'public');
        $brand->image = $imagePath;
    }

    // Mise à jour des autres champs
    $brand->title = $request->title;
    $brand->statut = $request->statut;
    $brand->idProduct = $request->idProduct;

    $brand->save();

    return redirect()->route('brands.index')->with('success', 'Marque mise à jour avec succès.');
}
public function destroy($id)
{
    // Récupère la marque à supprimer
    $brand = Brand::findOrFail($id);

    // Supprimer la marque de la base de données
    $brand->delete();

    // Rediriger l'utilisateur vers la liste des marques après la suppression
    return redirect()->route('brands.index')->with('success', 'Marque supprimée avec succès.');
}


}
