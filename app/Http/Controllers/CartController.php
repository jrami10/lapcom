<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; // Add this line if not already present

class CartController extends Controller // Ensure it extends Controller
{
    /**
     * Add a product to the cart.
     */
    public function add(Request $request, Product $product)
    {
        $user = Auth::user();
        $quantity = $request->input('quantity', 1); // Get quantity from form, default to 1
        $size = $request->input('size', null); // Get size if provided
    
        // 1. Check stock
        if ($product->stock < $quantity || $product->state !== 'disponible') {
            return back()->with('error', 'Stock insuffisant ou produit non disponible.');
        }
    
        // 2. Check if the product (with the same size) is already in the cart for this user
        $cartItem = Cart::where('idUser', $user->id)
                        ->where('idProduct', $product->id)
                        ->where('size', $size) // Include size in the check
                        ->first();
    
        if ($cartItem) {
            // 2a. Update quantity if already present
            $newQuantity = $cartItem->quantity + $quantity;
            if ($product->stock < $newQuantity) {
                 return back()->with('error', 'Quantité demandée dépasse le stock disponible.');
            }
            $cartItem->quantity = $newQuantity;
            $cartItem->amount = $cartItem->price * $newQuantity; // Recalculate amount
            $cartItem->save();
        } else {
            // 2b. Create a new cart entry
            Cart::create([
                'idUser' => $user->id,
                'idProduct' => $product->id,
                'price' => $product->promo ?? $product->price, // Use promo price if exists, otherwise normal price
                'quantity' => $quantity,
                'size' => $size,
                'amount' => ($product->promo ?? $product->price) * $quantity,
            ]);
        }
    
        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier !');
    }
    

    /**
     * Display the user's cart.
     */
    // CartController.php

public function index()
{
    $user = Auth::user();

    // 1. Récupérer les articles du panier de cet utilisateur
    $cartItems = Cart::where('idUser', $user->id)->with('product')->get();

    // 2. Calculer le total
    $total = $cartItems->sum('amount');

    // 3. Envoyer à la vue
    return view('cart.index', compact('cartItems', 'total'));
}

    /**
     * Remove an item from the cart.
     * Uses Route Model Binding for the Cart item.
     */
    public function remove(Cart $cart)
    {
        // Security check: Ensure the logged-in user owns this cart item
        if ($cart->idUser !== Auth::id()) {
             abort(403, 'Unauthorized action.'); // Forbidden
        }

        $cart->delete();
        return back()->with('success', 'Produit retiré du panier.');
    }

    /**
     * Update the quantity of a cart item.
     * Uses Route Model Binding for the Cart item.
     */
    public function update(Request $request, Cart $cart)
    {
        // Security check: Ensure the logged-in user owns this cart item
        if ($cart->idUser !== Auth::id()) {
             abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'quantity' => 'required|integer|min:0'
        ]);

        $newQuantity = $request->input('quantity');

        if ($newQuantity <= 0) {
            // If quantity is 0 or less, remove the item
            $cart->delete();
            return back()->with('success', 'Produit retiré du panier.');
        }

        // Re-load the product relation if it hasn't been loaded already
        $cart->loadMissing('product');

         // Check stock for the new quantity
        if ($cart->product->stock < $newQuantity || $cart->product->state !== 'disponible') {
             return back()->with('error', 'Stock insuffisant ou produit non disponible.');
        }

        $cart->quantity = $newQuantity;
        $cart->amount = $cart->price * $newQuantity; // Recalculate amount
        $cart->save();

        return back()->with('success', 'Quantité mise à jour.');
    }

    // Note: This controller does not contain methods like 'show', 'store' (for add), or 'destroy' (for remove)
    // that were referenced by the conflicting routes in the 'client' prefix group.
}