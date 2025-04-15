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
            {{ request()->routeIs('brands.index') || request()->routeIs('brands.create') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
            <i class="fa-solid fa-copyright mr-4 h-5 w-5"></i> 
            {{ __('Marques') }}
            <i class="fa-solid fa-chevron-down ml-auto" :class="open ? 'rotate-180' : 'rotate-0'"></i>
        </button>
    
        <div x-show="open" x-transition class="ml-8 space-y-1">
            <a href="{{ route('brands.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
                {{ request()->routeIs('brands.index') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                <i class="fa-solid fa-copyright mr-2"></i> 
                {{ __('Liste des Marques') }}
            </a>
            <a href="{{ route('brands.create') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
                {{ request()->routeIs('brands.create') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                <i class="fa-solid fa-plus mr-2"></i> 
                {{ __('Créer une Marque') }}
            </a>
        </div>
    </div>
    <!-- Produits -->
<div x-data="{ open: false }" class="mt-4 space-y-1 px-2">
    <button @click="open = !open" class="w-full flex items-center px-3 py-2 text-sm font-medium rounded-md 
        {{ request()->routeIs('products.index') || request()->routeIs('products.create') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
        <i class="fa-solid fa-box mr-4 h-5 w-5"></i> 
        {{ __('Produits') }}
        <i class="fa-solid fa-chevron-down ml-auto" :class="open ? 'rotate-180' : 'rotate-0'"></i>
    </button>

    <div x-show="open" x-transition class="ml-8 space-y-1">
        <a href="{{ route('products.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
            {{ request()->routeIs('products.index') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
            <i class="fa-brands fa-product-hunt mr-2"></i> 
            {{ __('Liste des Produits') }}
        </a>
        <a href="{{ route('products.create') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
            {{ request()->routeIs('products.create') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
            <i class="fa-solid fa-plus mr-2"></i> 
            {{ __('Créer un Produit') }}
        </a>
    </div>
</div>
</div>
