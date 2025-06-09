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

            <!-- Description limited to 2 lines -->
            <p class="mt-2 text-gray-600 line-clamp-2">{{ $category->description ?? 'Pas de description' }}</p>

            <!-- Centered Actions -->
            <div class="mt-4 flex justify-center gap-2">
                <a href="{{ route('category.edit', $category->id) }}" class="p-2 font-semibold bg-blue-600 text-white rounded hover:bg-blue-700 text-sm transition duration-200">Modifier</a>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 font-semibold bg-red-600 text-white rounded hover:bg-red-700 text-sm transition duration-200">Supprimer</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

    </div>
</div>

@endsection
   
