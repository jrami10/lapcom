<?php

namespace App\Http\Controllers;

use App\Models\Category; // N'oublie pas d'importer le modèle !
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::orderBy('id', 'desc')->take(6)->get(); // Les 6 derniers produits par exemple
        return view('client.index', compact('categories', 'products'));
    }
}
