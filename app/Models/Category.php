<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'is_parent', 'description', 'statut', 'id_parent'];

    public function products() {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function parent() {
        return $this->belongsTo(Category::class, 'id_parent');
    }

    public function childs() {
        return $this->hasMany(Category::class, 'id_parent');
    }
    public function produits() {
        return $this->hasMany(Product::class);
    }
    
}

