<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Marque</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Modifier la Marque</h1>

        <form action="{{ route('marques.update', $marque->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom de la marque</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" value="{{ $marque->name }}" required>
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-gray-700">Slug</label>
                <input type="text" name="slug" id="slug" class="w-full px-4 py-2 border rounded" value="{{ $marque->slug }}" required>
            </div>

            <div class="mb-4">
                <label for="logo" class="block text-gray-700">Logo (optionnel)</label>
                <input type="file" name="logo" id="logo" class="w-full px-4 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full px-4 py-2 border rounded">{{ $marque->description }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mettre à jour</button>
        </form>
    </div>

</body>
</html>
