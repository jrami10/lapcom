<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LapCom - Vente de Matériel Informatique</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

    <!-- Header -->
    <header class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-600">LapCom</a>
            <nav class="flex items-center gap-4">
                <input type="text" placeholder="Rechercher..." class="px-4 py-2 border border-gray-300 rounded-md focus:ring focus:outline-none">

                <!-- Panier -->
                <a href="#" class="relative text-blue-600 hover:text-blue-800">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    @if(isset($cartItemCount) && $cartItemCount > 0)
                        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                            {{ $cartItemCount }}
                        </span>
                    @endif
                </a>

                @auth
                    <!-- Menu utilisateur -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center text-gray-700 font-semibold hover:text-blue-600">
                            Bonjour, {{ Auth::user()->name }}
                            <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition 
                             class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md overflow-hidden z-20">
                            <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mes achats</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Déconnexion</button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">S'inscrire</a>
                @endguest
            </nav>
        </div>
    </header>

    <!-- Catégories -->
    <main class="container mx-auto py-12">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Catégories Populaires</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @foreach ($categories as $category)
                <div class="p-4 bg-white shadow-md rounded-lg text-center hover:shadow-lg transition-transform transform hover:scale-105">
                    <img src="{{ asset('../' . $category->image) }}" alt="{{ $category->name }}" class="mx-auto h-24 object-contain mb-2">
                    <p class="text-lg font-semibold text-gray-700">{{ $category->name }}</p>
                    <form method="POST" action="{{ route('cart.add', $category->id) }}">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                    
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                            Ajouter au panier
                        </button>

                    </form>
                    <a href="{{ route('category.show', $category->id) }}" class="text-blue-600 hover:underline mt-2 inline-block">Voir les produits</a>
                </div>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 py-8 text-center">
        <div class="container mx-auto">
            <p class="text-lg mb-4 font-medium">Abonnez-vous à notre newsletter</p>
            <div class="flex justify-center gap-2">
                <input type="email" placeholder="Votre email" class="px-4 py-2 rounded-md border border-gray-400 w-64 focus:outline-none focus:ring">
                <button class="bg-blue-600 px-4 text-white py-2 rounded-md hover:bg-blue-700">S'abonner</button>
            </div>
            <p class="mt-6 text-sm text-gray-600">&copy; 2025 LapCom. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
