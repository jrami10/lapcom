@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6">Votre panier</h2>

    @if(count($cartItems) > 0)
        <div class="grid grid-cols-1 gap-4">
            @foreach($cartItems as $item)
                <div class="bg-white p-4 shadow rounded-md flex items-center justify-between">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded mr-4">
                        <div>
                            <h4 class="font-semibold text-lg">{{ $item->product->name }}</h4>
                            <p>Quantité : {{ $item->quantity }}</p>
                            <p>Prix : {{ $item->price }} €</p>
                        </div>
                    </div>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">Supprimer</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="mt-4 flex justify-between items-center">
            <h4 class="text-xl font-semibold">Total : {{ $total }} €</h4>
            <a href="{{ route('orders.checkout') }}" class="...">Procéder à la commande</a>


        </div>
    @else
        <p class="text-gray-600">Votre panier est vide.</p>
    @endif
</div>
@endsection
