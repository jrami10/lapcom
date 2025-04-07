<x-guest-layout>
    <div class="w-200 flex items-center justify-center bg-gray-100">
        <div class=" bg-white shadow-lg rounded-2xl p-8 w-200">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Créer un compte</h2>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid md:grid-cols-2 gap-4"> 
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nom')" />
                        <x-text-input id="name" class="block w-full p-2 mt-1 border rounded-lg" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Username -->
                    <div>
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" class="block w-full p-2 mt-1 border rounded-lg" type="text" name="username" :value="old('username')" required />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block w-full p-2 mt-1 border rounded-lg" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Phone -->
                    <div>
                        <x-input-label for="phone" :value="__('Téléphone')" />
                        <x-text-input id="phone" class="block w-full p-2 mt-1 border rounded-lg" type="text" name="phone" :value="old('phone')" required />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Address -->
                    <div class="col-span-2"> <!-- Large field spanning both columns -->
                        <x-input-label for="address" :value="__('Adresse')" />
                        <x-text-input id="address" class="block w-full p-2 mt-1 border rounded-lg" type="text" name="address" :value="old('address')" required />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <!-- Profile Photo -->
                    <div>
                        <x-input-label for="photo_path" :value="__('Photo de Profil')" />
                        <x-text-input id="photo_path" class="block w-full p-2 mt-1 border rounded-lg" type="file" name="photo_path" accept="image/*" required />
                        <x-input-error :messages="$errors->get('photo_path')" class="mt-2" />
                    </div>

                    <!-- Status -->
                    <div>
                        <x-input-label for="statu_user" :value="__('Statut')" />
                        <select id="statu_user" name="statu_user" class="block w-full p-2 mt-1 border rounded-lg">
                            <option value="actif" {{ old('statu_user') == 'actif' ? 'selected' : '' }}>Actif</option>
                            <option value="inactif" {{ old('statu_user') == 'inactif' ? 'selected' : '' }}>Inactif</option>
                        </select>
                        <x-input-error :messages="$errors->get('statu_user')" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div>
                        <x-input-label for="role" :value="__('Rôle')" />
                        <select id="role" name="role" class="block w-full p-2 mt-1 border rounded-lg">
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="seller" {{ old('role') == 'seller' ? 'selected' : '' }}>Vendeur</option>
                            <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Mot de passe')" />
                        <x-text-input id="password" class="block w-full p-2 mt-1 border rounded-lg" type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                        <x-text-input id="password_confirmation" class="block w-full p-2 mt-1 border rounded-lg" type="password" name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div> 

                <!-- Bouton -->
                <div class="mt-6">
                    <button class="w-full bg-indigo-600 text-white p-3 rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                        S'inscrire
                    </button>
                </div>

                <!-- Lien vers connexion -->
                <p class="text-sm text-gray-600 mt-4 text-center">
                    Déjà inscrit ? 
                    <a href="{{ route('login') }}" class="text-indigo-500 hover:underline">Se connecter</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
