@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 ml-64 bg-gray-100">
    <h2 class="text-2xl font-bold mb-6 ">Détails de la Commande #{{ $order->id }}</h2>

    <div class="p-4 bg-white shadow rounded">
        <p><strong>Statut : </strong>{{ $order->statutOrder }}</p>
        <p><strong>Total : </strong>{{ $order->total }} €</p>
        <p><strong>Date : </strong>{{ $order->created_at->format('d/m/Y H:i') }}</p>

        <h3 class="text-xl mt-4">Produits :</h3>
        <ul>
            @foreach($order->products as $product)
                <li>{{ $product->name }} - {{ $product->price }} €</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
