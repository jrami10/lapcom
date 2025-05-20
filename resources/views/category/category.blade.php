@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Bouton d'ajout -->
        <div class="flex justify-end mb-6">
            <a href="{{ route('category.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Ajouter une catégorie
            </a>
        </div>

        <!-- Grille des catégories -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($categories as $category)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    @if($category->image)
                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="w-full h-40 object-cover rounded-md mb-4">
                    @endif
                    <h3 class="text-lg font-medium text-gray-900">{{ $category->name }}</h3>
                    <p class="mt-2 text-gray-600">{{ $category->description ?? 'Pas de description' }}</p>

                    <!-- Actions -->
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('category.edit', $category->id) }}" class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-sm">Modifier</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
   
