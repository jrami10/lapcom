<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LapCom - Vente de Matériel Informatique</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 w-full">
    <!-- Header -->
    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">LapCom</h1>
            <nav class="flex items-center gap-4">
                <input type="text" placeholder="Rechercher..." class="px-4 py-2 border rounded-md">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
<a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Register</a>

            </nav>
        </div>
    </header>
    
    <!-- Bannière -->
    <section class="relative bg-cover bg-center h-80 flex items-center justify-center text-blue" style="background-image: url('images/laptop-banner.jpg');">
        <div class="text-center">
            <h2 class="text-4xl font-bold">Trouvez le meilleur matériel informatique</h2>
            <p class="mt-2">Découvrez nos offres spéciales et promotions</p>
            <a href="#" class="mt-4 inline-block bg-blue-600 px-6 py-2 rounded-md text-white">Voir nos produits</a>
        </div>
    </section>
    
    <!-- Catégories -->
    <section class="container mx-auto mt-12">
        <h3 class="text-2xl font-bold mb-4">Catégories Populaires</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="p-4 bg-white shadow-md rounded-lg text-center hover:scale-105 transition">
                <img src="images/pc.jpg" alt="PC" class="mx-auto h-20">
                <p class="mt-2 font-semibold">PC Portables</p>
            </div>
            <div class="p-4 bg-white shadow-md rounded-lg text-center hover:scale-105 transition">
                <img src="images/component.jpg" alt="Composants" class="mx-auto h-20">
                <p class="mt-2 font-semibold">Composants</p>
            </div>
            <div class="p-4 bg-white shadow-md rounded-lg text-center hover:scale-105 transition">
                <img src="images/accessory.jpg" alt="Accessoires" class="mx-auto h-20">
                <p class="mt-2 font-semibold">Accessoires</p>
            </div>
            <div class="p-4 bg-white shadow-md rounded-lg text-center hover:scale-105 transition">
                <img src="images/peripheral.jpg" alt="Périphériques" class="mx-auto h-20">
                <p class="mt-2 font-semibold">Périphériques</p>
            </div>
        </div>
    </section>
    
    <!-- Meilleures Ventes -->
    <section class="container mx-auto mt-12">
        <h3 class="text-2xl font-bold mb-4">Meilleures Ventes</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-4 bg-white shadow-md rounded-lg">
                <img src="images/product1.jpg" alt="Produit" class="w-full h-40 object-cover rounded-md">
                <h4 class="mt-2 font-bold">Ordinateur Gaming XYZ</h4>
                <p class="text-gray-600">Puissant et performant</p>
                <div class="flex justify-between mt-2">
                    <span class="text-blue-600 font-bold">1200€</span>
                    <button class="bg-blue-600 text-white px-4 py-1 rounded-md">Ajouter</button>
                </div>
            </div>
            <div class="p-4 bg-white shadow-md rounded-lg">
                <img src="images/product2.jpg" alt="Produit" class="w-full h-40 object-cover rounded-md">
                <h4 class="mt-2 font-bold">Souris Gaming RGB</h4>
                <p class="text-gray-600">Réactive et ergonomique</p>
                <div class="flex justify-between mt-2">
                    <span class="text-blue-600 font-bold">49€</span>
                    <button class="bg-blue-600 text-white px-4 py-1 rounded-md">Ajouter</button>
                </div>
            </div>
            <div class="p-4 bg-white shadow-md rounded-lg">
                <img src="images/product3.jpg" alt="Produit" class="w-full h-40 object-cover rounded-md">
                <h4 class="mt-2 font-bold">Clavier Mécanique Pro</h4>
                <p class="text-gray-600">Confort de frappe optimal</p>
                <div class="flex justify-between mt-2">
                    <span class="text-blue-600 font-bold">89€</span>
                    <button class="bg-blue-600 text-white px-4 py-1 rounded-md">Ajouter</button>
                </div>
            </div>
        </div>
    </section>
    
    <footer class="bg-white w-full p-6 mt-12 text-center">
        <p class="mb-2">Abonnez-vous à notre newsletter pour recevoir les dernières offres</p>
        <input type="email" placeholder="Votre email" class="px-4 py-2 rounded-md text-black border-solid border-2 border-black focus:outline-none">
        <button class="bg-blue-600 px-4 text-white py-2 rounded-md ml-2">S'abonner</button>
        <p class="mt-4">&copy; 2025 LapCom. Tous droits réservés.</p>
    </footer>
    
</body>
</html>
