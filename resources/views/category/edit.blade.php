<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Modifier la catégorie</h2>
        
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label class="block text-gray-700">Nom :</label>
                <input type="text" name="name" value="{{ $category->name }}" class="w-full p-2 border rounded" required>
            </div>

            <!-- Slug -->
            <div class="mb-4">
                <label class="block text-gray-700">Slug :</label>
                <input type="text" name="slug" value="{{ $category->slug }}" class="w-full p-2 border rounded">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block text-gray-700">Description :</label>
                <textarea name="description" class="w-full p-2 border rounded">{{ $category->description }}</textarea>
            </div>

            <!-- Statut -->
            <div class="mb-4">
                <label class="block text-gray-700">Statut :</label>
                <select name="statut" class="w-full p-2 border rounded">
                    <option value="actif" {{ $category->statut == 'actif' ? 'selected' : '' }}>Actif</option>
                    <option value="inactif" {{ $category->statut == 'inactif' ? 'selected' : '' }}>Inactif</option>
                </select>
            </div>

            <!-- Image actuelle -->
            @if ($category->image)
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Image actuelle :</label>
                    <img src="{{ asset($category->image) }}" alt="Image" class="w-32 h-32 object-cover rounded">
                </div>
            @endif

            <!-- Nouvelle Image -->
            <div class="mb-4">
                <label class="block text-gray-700">Nouvelle Image (optionnel) :</label>
                <input type="file" name="image" class="w-full p-2 border rounded">
            </div>

            <!-- Is Parent -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Est une catégorie parente ?</label>
                <div class="flex gap-4">
                    <label><input type="radio" name="is_parent" value="1" {{ $category->is_parent ? 'checked' : '' }}> Oui</label>
                    <label><input type="radio" name="is_parent" value="0" {{ !$category->is_parent ? 'checked' : '' }}> Non</label>
                </div>
            </div>

            <!-- Parent Category -->
            <div class="mb-4 {{ $category->is_parent ? 'hidden' : '' }}" id="parent-category">
                <label class="block text-gray-700">Catégorie parente :</label>
                <select name="id_parent" class="w-full p-2 border rounded">
                    <option value="">-- Choisir une catégorie parente --</option>
                    @foreach ($categories as $parent)
                        <option value="{{ $parent->id }}" {{ $category->id_parent == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Bouton -->
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Mettre à jour</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const isParentRadios = document.querySelectorAll('input[name="is_parent"]');
            const parentCategoryDiv = document.getElementById('parent-category');

            function toggleParentCategory() {
                if (document.querySelector('input[name="is_parent"]:checked').value === "0") {
                    parentCategoryDiv.classList.remove('hidden');
                } else {
                    parentCategoryDiv.classList.add('hidden');
                }
            }

            isParentRadios.forEach(radio => {
                radio.addEventListener('change', toggleParentCategory);
            });

            toggleParentCategory();
        });
    </script>
</x-app-layout>
