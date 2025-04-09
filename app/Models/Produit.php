<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function category() {

        return $this->belongsTo(Category::class);
    }
    public function marque() {
        return $this->belongsTo(Marque::class, 'brand_id');
    }
    protected $fillable = ['name', 'slug', 'description', 'price', 'category_id', 'brand_id', 'image'];

}
