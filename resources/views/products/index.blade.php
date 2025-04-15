@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Liste des Produits</h1>

    <div class="mt-4">
        <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition duration-200">
            + Ajouter un produit
        </a>
    </div>

    <div class="mt-6">
        @if($produits->isEmpty())
            <p>Aucun produit trouvé.</p>
        @else
            <div class="overflow-x-auto shadow-md rounded-lg">
                <table class="w-full table-auto border-collapse shadow bg-white rounded-lg mt-4">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">Nom</th>
                            <th class="border px-4 py-2">Slug</th>
                            <th class="border px-4 py-2">Stock</th>
                            <th class="border px-4 py-2">Prix</th>
                            <th class="border px-4 py-2">Catégorie</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produits as $produit)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $produit->name }}</td>
                                <td class="border px-4 py-2">{{ $produit->slug }}</td>
                                <td class="border px-4 py-2">{{ $produit->stock }}</td>
                                <td class="border px-4 py-2">{{ $produit->price }} DH</td>
                                <td class="border px-4 py-2">{{ $produit->category->name }}</td>
                                <td class="border px-4 py-2 space-x-2">
                                    <a href="{{ route('products.edit', $produit->id) }}" class="inline-block bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500 transition duration-200">
                                        Modifier
                                    </a>
                                    <form action="{{ route('products.destroy', $produit->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Supprimer ce produit ?')" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-200">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

@endsection
