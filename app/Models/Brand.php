<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['title', 'image', 'statut', 'photo_path', 'idProduct'];

    public function product() {
        return $this->belongsTo(Product::class, 'idProduct');
    }
}
