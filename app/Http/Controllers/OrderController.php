<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Afficher les commandes de l'utilisateur connecté.
     */
    public function index()
    {
        $orders = Order::where('idUser', Auth::id())->get();
        return view('client.orders.index', compact('orders'));
    }

    /**
     * Afficher une commande spécifique.
     */
    public function show($id)
    {
        // Trouver la commande par son ID
        $order = Order::findOrFail($id);
    
        // Retourner la vue avec les détails de la commande
        return view('orders.show', compact('order'));
    }
    
    /**
     * Créer une nouvelle commande à partir du panier.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
    
        $cartItems = \App\Models\Cart::where('idUser', $user->id)->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }
    
        // Calculer les totaux
        $subTotal = $cartItems->sum('amount');
        $totalQuantity = $cartItems->sum('quantity');
        $total = $subTotal; // ajouter livraison ou coupon si besoin
    
        // Générer un numéro de commande unique
        $numOrder = time() . $user->id;
    
        // Créer la commande
        $order = Order::create([
            'idUser' => $user->id,
            'num_order' => $numOrder,
            'sub_total' => $subTotal,
            'total' => $total,
            'quantity' => $totalQuantity,
            'address' => $request->address,
    
            // champs obligatoires
            'name' => $user->name,
            'surname' => '',
            'email' => $user->email,
            'phone' => '',
            'statut_order' => 'inprogress', // pas "en cours"
        ]);
    
        // Ajouter les produits associés à la commande
        foreach ($cartItems as $item) {
            $order->products()->attach($item->idProduct, [
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }
    
        // Vider le panier
        \App\Models\Cart::where('idUser', $user->id)->delete();
    
        return redirect()->route('orders.index')->with('success', 'Commande créée avec succès.');
    }
    

    /**
     * Mettre à jour une commande.
     */
    public function update(Request $request, $id)
    {
        $order = Order::where('idUser', Auth::id())->findOrFail($id);
        $order->update($request->all());

        return back()->with('success', 'Commande mise à jour.');
    }

    /**
     * Supprimer une commande.
     */
    public function destroy($id)
    {
        $order = Order::where('idUser', Auth::id())->findOrFail($id);
        $order->delete();

        return back()->with('success', 'Commande supprimée.');
    }
    public function checkout()
{
    $user = Auth::user();
    $cartItems = \App\Models\Cart::where('idUser', $user->id)->with('product')->get();
    $subTotal = $cartItems->sum('amount');

    return view('client.orders.checkout', compact('cartItems', 'subTotal'));
}

}
