<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = [
        'num_order',
        'sub_total',
        'total',
        'coupon',
        'quantity',
        'delivery',
        'name',
        'surname',
        'email',
        'phone',
        'address',
        'statut_order', 
    ];

    /**
     * L'utilisateur ayant passé la commande.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    /**
     * Les produits liés à la commande (via la table pivot).
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('quantity', 'price') // si tu stockes ça dans la table pivot
                    ->withTimestamps();
    }

    /**
     * Les détails de la commande (si tu as une table OrderDetails).
     */
    public function details(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'idOrder');
    }
}
