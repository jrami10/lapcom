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

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block font-semibold">Nom</label>
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
            <label for="resume" class="block font-semibold">Résumé</label>
            <textarea name="resume" id="resume" class="w-full border rounded p-2">{{ old('resume') }}</textarea>
        </div>

        <div>
            <label for="stock" class="block font-semibold">Stock</label>
            <input type="number" name="stock" id="stock" class="w-full border rounded p-2" value="{{ old('stock') }}">
        </div>

        <div>
            <label for="price" class="block font-semibold">Prix</label>
            <input type="number" name="price" step="0.01" id="price" class="w-full border rounded p-2" value="{{ old('price') }}">
        </div>

        <div>
            <label for="promo" class="block font-semibold">Promo</label>
            <input type="number" name="promo" step="0.01" id="promo" class="w-full border rounded p-2" value="{{ old('promo') }}">
        </div>

        <div>
            <label for="state" class="block font-semibold">État</label>
            <select name="state" id="state" class="w-full border rounded p-2">
                <option value="disponible" {{ old('state') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="outofstock" {{ old('state') == 'outofstock' ? 'selected' : '' }}>Rupture de stock</option>
                <option value="soon" {{ old('state') == 'soon' ? 'selected' : '' }}>Bientôt disponible</option>
            </select>
        </div>

        <div>
            <label for="idCategory" class="block font-semibold">Catégorie</label>
            <select name="idCategory" id="idCategory" class="w-full border rounded p-2">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('idCategory') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image" class="block font-semibold">Image</label>
            <input type="file" name="image" id="image" class="w-full">
        </div>

        <input type="hidden" name="idUser" value="{{ auth()->id() }}">

        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Enregistrer
            </button>
        </div>
    </form>
</div>

@endsection
