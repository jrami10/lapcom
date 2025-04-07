<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marque; 

class MarquesController extends Controller
{
    // Afficher la liste des marques
    public function index()
    {
        $marques = Marque::all();  // Récupère toutes les marques dans la base de données
        return view('marques.index', compact('marques'));  // Renvoie la vue avec les marques
    }

    // Afficher le formulaire pour ajouter une nouvelle marque
    public function create()
    {
        return view('marques.create');
    }

    // Enregistrer une nouvelle marque dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:marques',
            'logo' => 'nullable|image',
            'description' => 'nullable|string',
        ]);

        $marque = new Marque();
        $marque->name = $request->name;
        $marque->slug = $request->slug;
        $marque->logo = $request->file('logo') ? $request->file('logo')->store('logos') : null;  // Gère le téléchargement de l'image logo
        $marque->description = $request->description;
        $marque->save();

        return redirect()->route('marques.index');
    }
    public function edit($id)
{
    $marque = Marque::findOrFail($id);
    
    return view('marques.edit', compact('marque'));
}
public function update(Request $request, $id)
{
    // Récupère la marque à modifier
    $marque = Marque::findOrFail($id);
    
    // Validation des données du formulaire
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|unique:marques,slug,' . $marque->id, // Unique sauf pour la marque actuelle
        'logo' => 'nullable|image',
        'description' => 'nullable|string',
    ]);

    // Mise à jour des informations de la marque
    $marque->name = $request->name;
    $marque->slug = $request->slug;
    $marque->logo = $request->file('logo') ? $request->file('logo')->store('logos') : $marque->logo;
    $marque->description = $request->description;
    
    // Sauvegarde des modifications dans la base de données
    $marque->save();

    // Redirection vers la liste des marques
    return redirect()->route('marques.index');
}
public function destroy($id)
{
    // Récupère la marque à supprimer
    $marque = Marque::findOrFail($id);

    // Supprimer la marque de la base de données
    $marque->delete();

    // Rediriger l'utilisateur vers la liste des marques après la suppression
    return redirect()->route('marques.index')->with('success', 'Marque supprimée avec succès.');
}


}
