@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<div class="container mx-auto py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full rounded shadow">
        </div>
        <div>
            <h2 class="text-3xl font-bold mb-4">{{ $product->name }}</h2>
            <p class="mb-4">{{ $product->description }}</p>
            <p class="text-xl text-blue-600 font-bold mb-4">{{ $product->price }} €</p>

            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
            
                <!-- Étape 1.1 : Ajoute le champ de quantité -->
                <input type="hidden" name="quantity" value="1">
            
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Ajouter au panier
                </button>
                
            </form>
            
        </div>
    </div>
</div>
@endsection
