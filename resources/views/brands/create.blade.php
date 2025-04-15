@extends('layouts.app')


@section('content')
<div class="container mx-auto px-4 py-8">
<h1 class="text-2xl font-bold mb-6">Ajouter une Marque</h1>

@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <div>
        <label for="title" class="block font-semibold">Titre</label>
        <input type="text" name="title" id="title" class="w-full border rounded p-2" value="{{ old('title') }}">
    </div>

    <div>
        <label for="image" class="block font-semibold">Image</label>
        <input type="file" name="image" id="image" class="w-full">
    </div>

    <div>
        <label for="statut" class="block font-semibold">Statut</label>
        <select name="statut" id="statut" class="w-full border rounded p-2">
            <option value="actif">Actif</option>
            <option value="inactif">Inactif</option>
        </select>
    </div>

    <div>
        <label for="idProduct" class="block font-semibold">Produit associé</label>
        <select name="idProduct" id="idProduct" class="w-full border rounded p-2">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Enregistrer
        </button>
    </div>
</form>
</div> 
@endsection

