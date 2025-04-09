@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Create Category</h2>
    @if ($errors->has('name'))
        <span class="text-red-500">
            <ul>
                @foreach($errors->get('name') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </span>
    @endif

    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label class="block text-gray-700">Name:</label>
            <input type="text" name="name" class="w-full p-2 border rounded" required>
        </div>
         <!-- Slug -->
         <div class="mb-4">
            <label class="block text-gray-700">Slug:</label>
            <input type="text" name="slug" class="w-full p-2 border rounded" required>
        </div>
        <!-- Image -->
        <div class="mb-4">
            <label class="block text-gray-700">Image:</label>
            <input type="file" name="image" class="w-full p-2 border rounded">
        </div>
         <!-- Is Parent (Radio Buttons) -->
         <div class="mb-4">
            <label class="block text-gray-700">Is Parent?</label>
            <div class="flex gap-4">
                <label>
                    <input type="radio" name="is_parent" value="1" checked class="is-parent"> Yes
                </label>
                <label>
                    <input type="radio" name="is_parent" value="0" class="is-parent"> No
                </label>
            </div>
        </div>
          <!-- Parent Category (Hidden if is_parent is true) -->
          <div class="mb-4 hidden" id="parent-category">
            <label class="block text-gray-700">Parent Category:</label>
            <select name="id_parent" class="w-full p-2 border rounded">
                <option value="">-- Select Parent Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Description -->
        <div class="mb-4">
            <label class="block text-gray-700">Description:</label>
            <textarea name="description" class="w-full p-2 border rounded"></textarea>
        </div>
        <!-- Status -->
        <div class="mb-4">
            <label class="block text-gray-700">Status:</label>
            <select name="statut" class="w-full p-2 border rounded">
                <option value="actif">Active</option>
                <option value="inactif">Inactive</option>
            </select>
        </div>

        <!-- Submit Button -->
    
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
    
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const isParentRadios = document.querySelectorAll('.is-parent');
    const parentCategoryDiv = document.getElementById('parent-category');

    function toggleParentCategory() {
        const isParentValue = document.querySelector('.is-parent:checked').value;
        if (isParentValue === '0') {
            parentCategoryDiv.classList.remove('hidden');
        } else {
            parentCategoryDiv.classList.add('hidden');
        }
    }

    // Lancer au chargement de la page (au cas où c'est "No" par défaut)
    toggleParentCategory();

    // Écouter les changements
    isParentRadios.forEach(radio => {
        radio.addEventListener('change', toggleParentCategory);
    });
});
</script>

@endsection
    


