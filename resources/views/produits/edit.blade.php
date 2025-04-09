@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Modifier le produit</h1>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Champ Nom -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom du produit</label>
            <input type="text" name="name" id="name" value="{{ $produit->name }}" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Champ Prix -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
            <input type="number" name="price" id="price" value="{{ old('price', $produit->price) }}" step="0.01" min="0" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        
        <!-- Champ Catégorie -->
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
            <select name="category_id" id="category_id"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $produit->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <!-- Champ Marque -->
        <div class="mb-4">
            <label for="marque_id" class="block text-sm font-medium text-gray-700">Marque</label>
            <select name="marque_id" id="marque_id"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @foreach($marques as $marque)
                    <option value="{{ $marque->id }}" {{ $produit->marque_id == $marque->id ? 'selected' : '' }}>
                        {{ $marque->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Bouton de soumission -->
        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-200">
                Enregistrer les modifications
            </button>
        </div>
    </form>
</div>
@endsection
