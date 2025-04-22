<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'resume', 'stock', 'image', 
        'price','promo', 'state', 'statut_taxe', 
        'idCategory', 'idbrand', 'idUser'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'idCategory');
    }
    public function brand() {
        return $this->belongsTo(Brand::class, 'idBrand');
    }

    public function seller() {
        return $this->belongsTo(User::class, 'idUser');
        
    }
    public function orders() {
        return $this->belongsToMany(Order::class, 'order_details', 'idProduct', 'idOrder')
                    ->withPivot('quantity');
    }
    public function user() // Le créateur/vendeur du produit
{
    return $this->belongsTo(User::class, 'idUser');
}
}
