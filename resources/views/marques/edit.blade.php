<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Marque</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Font Awesome -->
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="fixed left-0 top-0 w-64 h-screen bg-gray-200 text-black-300 p-4 hidden sm:block">
        <h2 class="text-xl font-semibold mb-6 text-black-300">Administration</h2>
        <div class="mt-4 space-y-1 px-2">
            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
                {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                <i class="fa-solid fa-house mr-4 h-5 w-5 mt-2"></i> 
                {{ __('Tableaux de bord') }}
            </a>
        </div>
    
        <!-- Catégories -->
        <div x-data="{ open: false }" class="mt-4 space-y-1 px-2">
            <button @click="open = !open" class="w-full flex items-center px-3 py-2 text-sm font-medium rounded-md 
                {{ request()->routeIs('category.index') || request()->routeIs('category.create') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                <i class="fa-solid fa-list mr-4 h-5 w-5"></i> 
                {{ __('Catégories') }}
                <i class="fa-solid fa-chevron-down ml-auto" :class="open ? 'rotate-180' : 'rotate-0'"></i>
            </button>
        
            <div x-show="open" x-transition class="ml-8 space-y-1">
                <a href="{{ route('category.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
                    {{ request()->routeIs('category.index') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                    <i class="fa-solid fa-list mr-2"></i> 
                    {{ __('Liste des Catégories') }}
                </a>
                <a href="{{ route('category.create') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
                    {{ request()->routeIs('category.create') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                    <i class="fa-solid fa-plus mr-2"></i> 
                    {{ __('Créer une Catégorie') }}
                </a>
            </div>
        </div>
    
        <!-- Marques -->
        <div x-data="{ open: false }" class="mt-4 space-y-1 px-2">
            <button @click="open = !open" class="w-full flex items-center px-3 py-2 text-sm font-medium rounded-md 
                {{ request()->routeIs('marques.index') || request()->routeIs('marques.create') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                <i class="fa-solid fa-copyright mr-4 h-5 w-5"></i> 
                {{ __('Marques') }}
                <i class="fa-solid fa-chevron-down ml-auto" :class="open ? 'rotate-180' : 'rotate-0'"></i>
            </button>
        
            <div x-show="open" x-transition class="ml-8 space-y-1">
                <a href="{{ route('marques.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
                    {{ request()->routeIs('marques.index') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                    <i class="fa-solid fa-copyright mr-2"></i> 
                    {{ __('Liste des Marques') }}
                </a>
                <a href="{{ route('marques.create') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
                    {{ request()->routeIs('marques.create') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                    <i class="fa-solid fa-plus mr-2"></i> 
                    {{ __('Créer une Marque') }}
                </a>
            </div>
        </div>
    </div>
    
    <!-- Contenu principal -->
    <div class="ml-64 p-8">
        <h1 class="text-2xl font-bold mb-6">Modifier la Marque</h1>

        <form action="{{ route('marques.update', $marque->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom de la marque</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" value="{{ $marque->name }}" required>
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-gray-700">Slug</label>
                <input type="text" name="slug" id="slug" class="w-full px-4 py-2 border rounded" value="{{ $marque->slug }}" required>
            </div>

            <div class="mb-4">
                <label for="logo" class="block text-gray-700">Logo (optionnel)</label>
                <input type="file" name="logo" id="logo" class="w-full px-4 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full px-4 py-2 border rounded">{{ $marque->description }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mettre à jour</button>
        </form>
    </div>

</body>
</html>
