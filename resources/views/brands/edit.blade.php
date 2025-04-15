@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-6">Modifier la Marque</h1>

    <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
    
        <div>
            <label for="title" class="block font-semibold">Titre</label>
            <input type="text" name="title" id="title" class="w-full border rounded p-2" value="{{ old('title', $brand->title) }}" required>
        </div>
    
        <div>
            <label for="image" class="block font-semibold">Image (logo)</label>
            <input type="file" name="image" id="image" class="w-full">
            @if ($brand->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $brand->image) }}" alt="Logo actuel" class="h-12">
                </div>
            @endif
        </div>
    
        <div>
            <label for="statut" class="block font-semibold">Statut</label>
            <select name="statut" id="statut" class="w-full border rounded p-2">
                <option value="actif" {{ $brand->statut === 'actif' ? 'selected' : '' }}>Actif</option>
                <option value="inactif" {{ $brand->statut === 'inactif' ? 'selected' : '' }}>Inactif</option>
            </select>
        </div>
    
        <div>
            <label for="idProduct" class="block font-semibold">Produit associé</label>
            <select name="idProduct" id="idProduct" class="w-full border rounded p-2">
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $brand->idProduct == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Mettre à jour
            </button>
        </div>
    </form>
    
</div> 
@endsection
    
   

