
<div class="fixed left-0 top-0 w-64 h-screen bg-gray-200 text-black-300 hidden sm:block">
    <h2 class="text-xl font-semibold m-6 text-black-300">{{auth()->user()->name}}</h2>
    <div class="mt-4 space-y-1 px-2">
        <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
            {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
            <i class="fa-solid fa-house mr-4 h-5 w-5 mt-2"></i> 
            {{ __('Tableaux de bord') }}
        </a>
    </div>

    <!-- Catégories -->
    <div x-data="{ open: false }" class="mt-4 space-y-1 px-2">
       <a href="{{route('orders.index')}}"><button @click="open = !open" class="w-full flex items-center px-3 py-2 text-sm font-medium rounded-md 
            {{ request()->routeIs('orders.index') || request()->routeIs('orders.create') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
            <i class="fa-solid fa-store mr-4 mt-2 h-5 w-5"></i>
            {{ __('Mes achats') }}
        </button></a> 
    </div>
    <div x-data="{ open: false }" class="mt-4 space-y-1 px-2">
       <a href="{{route('cart.index')}}"><button @click="open = !open" class="w-full flex items-center px-3 py-2 text-sm font-medium rounded-md 
            {{ request()->routeIs('cart.index') || request()->routeIs('cart.create') ? 'bg-gray-100 text-blue-700' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
            <i class="fa-solid fa-cart-shopping mr-4 mt-2 h-5 w-5"></i>
            {{ __('Mon panier') }}
        </button></a> 
    </div>
</div>

