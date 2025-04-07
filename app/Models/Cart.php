<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['price', 'size', 'quantity', 'amount', 'idUser', 'idProduct', 'idOrder'];

    public function user() {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'idProduct');
    }

    public function order() {
        return $this->belongsTo(Order::class, 'idOrder');
    }
}
