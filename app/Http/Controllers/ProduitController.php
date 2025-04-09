<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Category;
use App\Models\Marque;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        $categories = Category::all();
        $marques = Marque::all();
        return view('produits.create', compact('categories', 'marques'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:produits',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:marques,id',
            'image' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('produits', 'public');
        }

        Produit::create($data);

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        $categories = Category::all();
        $marques = Marque::all();
        return view('produits.edit', compact('produit', 'categories', 'marques'));
    }

    public function update(Request $request, Produit $produit)
{
    // Validation des données
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0', // Vérifie que le prix est numérique et positif
        'category_id' => 'required|exists:categories,id',
        'marque_id' => 'required|exists:marques,id',
    ]);

    // Mise à jour du produit
    $produit->update([
        'name' => $request->name,
        'price' => $request->price, // Mise à jour du prix
        'category_id' => $request->category_id,
        'marque_id' => $request->marque_id,
    ]);

    // Redirection après mise à jour
    return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès!');
}


    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
