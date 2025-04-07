<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h3 class="text-lg font-medium">{{ __('Hello, ') . Auth::user()->name . '!' }}</h3>
        <p>{{ __("You're logged in!") }}</p>
    </div>
</x-app-layout>
