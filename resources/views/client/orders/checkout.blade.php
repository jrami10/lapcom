@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Passer la commande</h2>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Adresse de livraison</label>
            <input type="text" name="address" value="{{ old('address') }}" class="w-full border rounded px-4 py-2" required>
        </div>

        <!-- Récapitulatif du panier -->
        <h3 class="text-xl font-semibold mb-2">Résumé</h3>
        @foreach($cartItems as $item)
            <div class="mb-2">
                {{ $item->product->name }} - x{{ $item->quantity }} ({{ $item->amount }} €)
            </div>
        @endforeach

        <div class="font-bold mt-4">Total : {{ $subTotal }} €</div>

        <!-- Champs cachés pour transmettre les données -->
        <input type="hidden" name="sub_total" value="{{ $subTotal }}">
        <input type="hidden" name="total" value="{{ $subTotal }}">
        <input type="hidden" name="quantity" value="{{ $cartItems->sum('quantity') }}">

        <button type="submit" class="mt-4 bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
            Confirmer la commande
        </button>
    </form>
</div>
@endsection
