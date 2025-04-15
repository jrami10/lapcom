@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
       

        <div class="mb-4">
            <a href="{{ route('brands.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Ajouter une nouvelle marque
            </a>
        </div>
        <h1 class="text-2xl font-bold mt-6 mb-6">Liste des Marques</h1>

        <table class="w-full table-auto border-collapse shadow bg-white rounded-lg text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Nom</th>
                    <th class="border px-4 py-2">Logo</th>
                    <th class="border px-4 py-2">Statut</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                <tr>
                    <td class="border px-4 py-2">{{ $brand->title }}</td>
                    <td class="border px-4 py-2">
                        @if ($brand->image)
                            <img src="{{ asset('storage/' . $brand->image) }}" class="h-10 mx-auto" alt="{{ $brand->name }}">
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $brand->statut }}</td>
                    <td class="border px-4 py-2">
                        <!-- Modifier -->
                        <a href="{{ route('brands.edit', $brand->id) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-400 inline-block">
                            Modifier
                        </a>
        
                        <!-- Supprimer -->
                        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 inline-block" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette marque ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection
