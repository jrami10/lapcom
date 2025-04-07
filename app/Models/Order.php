<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'num_order', 'sub_total', 'total', 'coupon', 'quantity',
        'delivery', 'name', 'surname', 'email', 'phone', 'address',
        'statutOrder', 'idUser', 'idProduct'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'order_details', 'idOrder', 'idProduct')
                    ->withPivot('quantity');
    }
}
