@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Modifier le produit</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-semibold">Nom</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2" value="{{ old('name', $product->name) }}">
        </div>

        <div>
            <label for="slug" class="block font-semibold">Slug</label>
            <input type="text" name="slug" id="slug" class="w-full border rounded p-2" value="{{ old('slug', $product->slug) }}">
        </div>

        <div>
            <label for="description" class="block font-semibold">Description</label>
            <textarea name="description" id="description" class="w-full border rounded p-2">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label for="resume" class="block font-semibold">Résumé</label>
            <textarea name="resume" id="resume" class="w-full border rounded p-2">{{ old('resume', $product->resume) }}</textarea>
        </div>

        <div>
            <label for="stock" class="block font-semibold">Stock</label>
            <input type="number" name="stock" id="stock" class="w-full border rounded p-2" value="{{ old('stock', $product->stock) }}">
        </div>

        <div>
            <label for="price" class="block font-semibold">Prix</label>
            <input type="number" name="price" step="0.01" id="price" class="w-full border rounded p-2" value="{{ old('price', $product->price) }}">
        </div>

        <div>
            <label for="promo" class="block font-semibold">Promo</label>
            <input type="number" name="promo" step="0.01" id="promo" class="w-full border rounded p-2" value="{{ old('promo', $product->promo) }}">
        </div>

        <div>
            <label for="state" class="block font-semibold">État</label>
            <select name="state" id="state" class="w-full border rounded p-2">
                <option value="disponible" @selected(old('state', $product->state) == 'disponible')>Disponible</option>
                <option value="outofstock" @selected(old('state', $product->state) == 'outofstock')>Rupture</option>
                <option value="soon" @selected(old('state', $product->state) == 'soon')>Bientôt</option>
            </select>
        </div>

        <div>
            <label for="idCategory" class="block font-semibold">Catégorie</label>
            <select name="idCategory" id="idCategory" class="w-full border rounded p-2">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('idCategory', $product->idCategory) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image" class="block font-semibold">Image</label>
            <input type="file" name="image" id="image" class="w-full">
            @if ($product->image)
                <p class="mt-2 text-sm">Image actuelle :</p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Image du produit" class="h-20 mt-1">
            @endif
        </div>

        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Mettre à jour
            </button>
        </div>
    </form>
</div>

@endsection
