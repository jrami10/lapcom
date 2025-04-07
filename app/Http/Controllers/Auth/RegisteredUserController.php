<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\UserRole;
use App\UserStatus;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required','string','max:255','unique:'.User::class],
            'address' => ['string','required'],
            'phone' => ['required','string','max:10'],
            'photo_path' => ['required','image','mimes:jpeg,png,jpg',
            'max:2048','dimensions:min_width=100,min_height=100',],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'statu_user' => ['required', 'string', 'in:actif,inactif'], 
            'role' => ['required','string','in:admin,seller,client']
        ],
        [
           // Messages d'erreur personnalisés
    'name.required' => 'Le nom est obligatoire.',
    'name.string' => 'Le nom doit être une chaîne de caractères.',
    'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',

    'username.required' => "Le nom d'utilisateur est obligatoire.",
    'username.string' => "Le nom d'utilisateur doit être une chaîne de caractères.",
    'username.max' => "Le nom d'utilisateur ne doit pas dépasser 255 caractères.",
    'username.unique' => "Ce nom d'utilisateur est déjà pris.",

    'address.required' => "L'adresse est obligatoire.",
    'address.string' => "L'adresse doit être une chaîne de caractères.",

    'phone.required' => 'Le numéro de téléphone est obligatoire.',
    'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
    'phone.max' => 'Le numéro de téléphone ne doit pas dépasser 10 chiffres.',

    'photo_path.required' => 'Veuillez télécharger une photo de profil.',
    'photo_path.image' => 'Le fichier doit être une image.',
    'photo_path.mimes' => 'Formats acceptés : JPEG, PNG, JPG.',
    'photo_path.max' => 'L’image ne doit pas dépasser 2MB.',
    'photo_path.dimensions' => 'L’image doit être d’au moins 100x100 pixels.',

    'email.required' => 'L’adresse email est obligatoire.',
    'email.string' => 'L’adresse email doit être une chaîne de caractères.',
    'email.lowercase' => 'L’adresse email doit être en minuscules.',
    'email.email' => 'Veuillez entrer une adresse email valide.',
    'email.max' => 'L’adresse email ne doit pas dépasser 255 caractères.',
    'email.unique' => 'Cette adresse email est déjà utilisée.',

    'password.required' => 'Le mot de passe est obligatoire.',
    'password.confirmed' => 'Les mots de passe ne correspondent pas.',

    'statu_user.required' => 'Le statut de l’/utilisateur est obligatoire.',
    'statu_user.in' => 'Le statut doit être "actif" ou "inactif".',

    'role.required' => 'Le rôle est obligatoire.',
    'role.in' => 'Le rôle doit être "admin", "seller" ou "client".',
]);
        
        
      
        if ($request->hasFile('photo_path')) {
            $filename = Str::slug($validated['name']) . '-' . time() . '.' . $request->file('photo_path')->getClientOriginalExtension();
            $path = $request->file('photo_path')->storeAs('profile-photos', $filename, 'public');
            $validated['photo_path'] = $path;
        }
    

        $user = User::create([
            'name' => $validated['name'],
            'username' =>$validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => UserRole::from($validated['role']),
            'photo_path' => $validated['photo_path'] ?? null,
            'statu_user' => UserStatus::from($validated['statu_user']),
            'address' => $validated['address'],
            'phone' => $validated['phone'],
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
