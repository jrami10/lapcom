<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Categories</h2>
        
        <!-- Add Category Button -->
        <a href="{{ route('category.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Add Category</a>

        <table class="min-w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Slug</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="px-4 py-2">{{ $category->name }}</td>
                        <td class="px-4 py-2">{{ $category->slug }}</td>
                        <td class="px-4 py-2">{{ $category->statut }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('category.edit', $category->id) }}" class="text-blue-500">Edit</a> |
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>



