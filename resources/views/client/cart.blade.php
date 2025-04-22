@extends('layouts.app') 

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6">Votre panier</h2>

    @if(count($cart) > 0)
        <div class="grid grid-cols-1 gap-4">
            @foreach($cart as $id => $item)
                <div class="bg-white p-4 shadow rounded-md flex items-center justify-between">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded mr-4">
                        <div>
                            <h4 class="font-semibold text-lg">{{ $item['name'] }}</h4>
                            <p>Quantité : {{ $item['quantity'] }}</p>
                            <p>Prix : {{ $item['price'] }} €</p>
                        </div>
                    </div>
                    <form action="{{ route('cart.destroy', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">Supprimer</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">Votre panier est vide.</p>
    @endif
</div>
@endsection
