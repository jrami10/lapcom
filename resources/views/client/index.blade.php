<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LapCom - Vente de Matériel Informatique</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Header -->
    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">LapCom</h1>
            <nav class="flex items-center gap-4">
                <input type="text" placeholder="Rechercher..." class="px-4 py-2 border rounded-md">
            
                @guest
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Register</a>
                @endguest
            
                @auth
                    <span class="text-gray-700 font-semibold">Bonjour, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">Logout</button>
                    </form>
                @endauth
            </nav>
            
        </div>
    </header>
    
    <!-- Bannière -->
    <section class="relative bg-cover bg-center h-80 flex items-center justify-center text-blue" style="background-image: url('images/laptop-banner.jpg');">
        <div class="text-center">
            <h2 class="text-4xl font-bold">Trouvez le meilleur matériel informatique</h2>
            <p class="mt-2">Découvrez nos offres spéciales et promotions</p>
            <a href="#" class="mt-4 inline-block bg-blue-600 px-6 py-2 rounded-md">Voir nos produits</a>
        </div>
    </section>
    
    <!-- Catégories dynamiques -->
<section class="container mx-auto mt-12">
    <h3 class="text-3xl font-bold mb-6 text-center">Catégories Populaires</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($categories as $category)
            <div class="p-4 bg-white shadow-md rounded-lg text-center hover:scale-105 transition">
                <img src="{{ asset('../' . $category->image) }}" alt="{{ $category->name }}" class="mx-auto h-20 object-cover">
                <p class="mt-2 font-semibold">{{ $category->name }}</p>
            </div>
        @endforeach
    </div>
</section>

    

<!-- Produits dynamiques -->
<section class="container mx-auto mt-12">
    <h3 class="text-3xl font-bold mb-6 text-center">Nos Meilleurs Produits</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h4>
                    <p class="text-sm text-gray-600 mt-1">{{ Str::limit($product->description, 60) }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-blue-600 font-bold text-lg">{{ $product->price }} €</span>
                        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Voir</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


    
    
    <!-- Footer -->
    <footer class="bg-gray-500 text-white p-6 mt-12 text-center">
        <p class="mb-2">Abonnez-vous à notre newsletter pour recevoir les dernières offres</p>
        <input type="email" placeholder="Votre email" class="px-4 py-2 rounded-md text-black">
        <button class="bg-blue-600 px-4 py-2 rounded-md ml-2">S'abonner</button>
        <p class="mt-4">&copy; 2025 LapCom. Tous droits réservés.</p>
    </footer>
</body>
</html>
