@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Ajouter un produit</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label for="name" class="block font-semibold">Nom du produit</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2" value="{{ old('name') }}">
        </div>

        <div>
            <label for="slug" class="block font-semibold">Slug</label>
            <input type="text" name="slug" id="slug" class="w-full border rounded p-2" value="{{ old('slug') }}">
        </div>

        <div>
            <label for="description" class="block font-semibold">Description</label>
            <textarea name="description" id="description" class="w-full border rounded p-2">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="price" class="block font-semibold">Prix</label>
            <input type="number" step="0.01" name="price" id="price" class="w-full border rounded p-2" value="{{ old('price') }}">
        </div>

        <div>
            <label for="category_id" class="block font-semibold">Catégorie</label>
            <select name="category_id" id="category_id" class="w-full border rounded p-2">
                <option value="">-- Choisir une catégorie --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="brand_id" class="block font-semibold">Marque</label>
            <select name="brand_id" id="brand_id" class="w-full border rounded p-2">
                <option value="">-- Choisir une marque --</option>
                @foreach($marques as $marque)
                    <option value="{{ $marque->id }}" {{ old('brand_id') == $marque->id ? 'selected' : '' }}>
                        {{ $marque->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image" class="block font-semibold">Image</label>
            <input type="file" name="image" id="image" class="w-full">
        </div>

        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
