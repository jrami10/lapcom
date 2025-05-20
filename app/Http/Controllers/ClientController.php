<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_parent','1')->get();
        $products = Product::orderBy('id', 'desc')->take(6)->get(); 
        return view('client.index', compact('categories', 'products'));
    }
    public function showCategory($id)

    {
        $category = Category::findOrFail($id);
        $categories = Category::where('is_parent', '0')->where('id_parent', $category->id)->get();
        return view('client.category', compact('categories'));
    }

}
