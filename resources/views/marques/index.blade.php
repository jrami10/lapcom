@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
       

        <div class="mb-4">
            <a href="{{ route('marques.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Ajouter une nouvelle marque
            </a>
        </div>
        <h1 class="text-2xl font-bold mt-6 mb-6">Liste des Marques</h1>

        <table class="w-full table-auto border-collapse shadow bg-white rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Nom</th>
                    <th class="border px-4 py-2">Slug</th>
                    <th class="border px-4 py-2">Logo</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marques as $marque)
                <tr>
                    <td class="border px-4 py-2">{{ $marque->name }}</td>
                    <td class="border px-4 py-2">{{ $marque->slug }}</td>
                    <td class="border px-4 py-2">
                        @if ($marque->logo)
                            <img src="{{ asset('storage/' . $marque->logo) }}" class="h-10" alt="{{ $marque->name }}">
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $marque->description }}</td>
                    <td class="border px-4 py-2">
                        <!-- Modifier -->
                        <a href="{{ route('marques.edit', $marque->id) }}" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-400 inline-block">
                            Modifier
                        </a>

                        <!-- Supprimer -->
                        <form action="{{ route('marques.destroy', $marque->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 inline-block" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette marque ?')">
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
