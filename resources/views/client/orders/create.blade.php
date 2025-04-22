@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Finaliser ma commande</h2>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Adresse de livraison</h3>
            <input type="text" name="address" class="w-full border p-2 rounded mb-4" placeholder="Adresse" required>

            <h3 class="text-lg font-semibold mb-4">Méthode de paiement</h3>
            <label><input type="radio" name="payment_method" value="cod" checked> Paiement à la livraison</label>

            <h3 class="text-lg font-semibold mt-6 mb-2">Votre panier</h3>
            @foreach($cartItems as $item)
                <p>{{ $item->product->name }} - {{ $item->quantity }} x {{ $item->price }} €</p>
            @endforeach

            <p class="mt-4 font-bold">Total : {{ $subTotal }} €</p>

            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Valider la commande</button>
        </div>
    </form>
</div>
@endsection
