<div class="fixed left-0 top-0 w-64 h-screen bg-gray-500 text-black-300 p-4 hidden sm:block">
    <h2 class="text-xl font-semibold mb-6 text-black-300">Administration</h2>
    <ul class="space-y-6">
        <!-- Tableau de bord -->
        <li>
            <a href="{{ route('dashboard') }}" class="block p-2 rounded hover:bg-gray-600 hover:text-white transition">
                <i class="fas fa-tachometer-alt mr-2"></i> Tableau de bord
            </a>
        </li>

        <!-- Catégories -->
        <li class="space-y-2">
            <a href="{{route('category.index')}}" id="categoryToggle" class="block p-2 rounded hover:bg-gray-600 hover:text-white transition">
                <i class="fas fa-list-alt mr-2"></i> Catégories
            </a>
            <!-- Sous-menu pour Ajouter une catégorie -->
            <ul id="categorySubMenu" class="space-y-2 pl-4 hidden">
                <li>
                    <a href="{{ route('category.create') }}" class="block p-2 rounded hover:bg-gray-500 hover:text-white transition">
                        <i class="fas fa-plus mr-2"></i> Ajouter une catégorie
                    </a>
                </li>
            </ul>
        </li>

        <!-- Marques -->
        <li>
            <a href="{{ route('marques.index') }}" class="block p-2 rounded hover:bg-gray-600 hover:text-white transition">
                <i class="fas fa-cogs mr-2"></i> Marques
            </a>
        </li>

        <!-- Déconnexion -->
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block p-2 w-full text-left rounded hover:bg-gray-600 hover:text-white transition">
                    <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                </button>
            </form>
        </li>
    </ul>
    <script>
        // Toggle the visibility of the category sub-menu when clicking on "Catégories"
        document.getElementById('categoryToggle').addEventListener('click', function() {
            var subMenu = document.getElementById('categorySubMenu');
            subMenu.classList.toggle('hidden');
        });
    </script>
    
</div>

