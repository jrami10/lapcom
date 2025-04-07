<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['price', 'size', 'quantity', 'amount', 'idUser', 'idProduct'];

    public function user() {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'idProduct');
    }
}
