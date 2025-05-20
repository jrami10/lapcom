<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Affiche la liste des catégories
    public function index()
    {
        $categories = Category::all();
        return view('category.category', compact('categories'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        $categories = Category::where('is_parent', true)->get();
        return view('category.create', compact('categories'));
    }

    // Enregistre une nouvelle catégorie
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'is_parent' => 'required',
            'id_parent' => 'nullable',
            'description' => 'nullable|string',
            'statut' => 'required',
        ]);

        $validated['is_parent'] = $validated['is_parent'] == "1";

        if ($validated['is_parent']) {
            $validated['id_parent'] = null;
        }

        if (!$request->slug) {
            $validated['slug'] = Str::slug($request->name, '-');
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/categories'), $imageName);
            $validated['image'] = 'uploads/categories/' . $imageName;
        }
       
        Category::create($validated);
       
        return redirect()->route('category.index')->with('success', 'Catégorie ajoutée avec succès !');
    }

    // Affiche le formulaire de modification
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('is_parent', true)->where('id', '!=', $id)->get();
        return view('category.edit', compact('category', 'categories'));
    }

    // Met à jour une catégorie existante
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_parent' => 'required',
            'id_parent' => 'nullable',
            'description' => 'nullable|string',
            'statut' => 'required',
        ]);

        $validated['is_parent'] = $validated['is_parent'] == "1";

        if ($validated['is_parent']) {
            $validated['id_parent'] = null;
        }

        if (!$request->slug) {
            $validated['slug'] = Str::slug($request->name, '-');
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/categories'), $imageName);
            $validated['image'] = 'uploads/categories/' . $imageName;
        }

        $category->update($validated);

        return redirect()->route('category.index')->with('success', 'Catégorie mise à jour avec succès !');
    }

    // Supprimer une catégorie
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Catégorie supprimée avec succès !');
    }
}
