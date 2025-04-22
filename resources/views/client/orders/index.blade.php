@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Mes Commandes</h2>

    @if($orders->count())
        <div class="space-y-4">
            @foreach($orders as $order)
                <div class="p-4 bg-white shadow rounded">
                    <p><strong>Commande #{{ $order->id }}</strong></p>
                    <p>Statut : {{ $order->statutOrder }}</p>
                    <p>Total : {{ $order->total }} €</p>
                    <p>Date : {{ $order->created_at->format('d/m/Y H:i') }}</p>
                    <a href="{{ route('orders.show', $order->id) }}" class="text-blue-500 hover:underline">Voir les détails</a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">Aucune commande passée pour le moment.</p>
    @endif
</div>
@endsection
