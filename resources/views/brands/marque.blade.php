<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Marques') }}
            </h2>
        </x-slot>
    
        <div class="py-12 px-6">
            <!-- Grille des cartes de marques -->
            <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Marque 1 -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <img class="w-full h-56 object-cover" src="https://via.placeholder.com/300" alt="Marque 1">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Marque 1</h3>
                        <p class="mt-2 text-gray-700 dark:text-gray-400">Description de la marque 1.</p>
                    </div>
                </div>
    
                <!-- Marque 2 -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <img class="w-full h-56 object-cover" src="https://via.placeholder.com/300" alt="Marque 2">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Marque 2</h3>
                        <p class="mt-2 text-gray-700 dark:text-gray-400">Description de la marque 2.</p>
                    </div>
                </div>
    
                <!-- Marque 3 -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <img class="w-full h-56 object-cover" src="https://via.placeholder.com/300" alt="Marque 3">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Marque 3</h3>
                        <p class="mt-2 text-gray-700 dark:text-gray-400">Description de la marque 3.</p>
                    </div>
                </div>
    
                <!-- Marque 4 -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <img class="w-full h-56 object-cover" src="https://via.placeholder.com/300" alt="Marque 4">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Marque 4</h3>
                        <p class="mt-2 text-gray-700 dark:text-gray-400">Description de la marque 4.</p>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    
</body>
</html>