<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'livree',
        'client_id',
        'delivery_status',
        'address',
        'country',
        'region',
        'city',
        'zip',
        'payment_method',
        'notes',
        'total',
    ];

    protected $casts = [
        'date' => 'date',
        'livree' => 'boolean',
        'delivery_status' => 'string',
    ];

    /**
     * Relation avec User (le client)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    /*
     * Relation historique existante
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    /**
     * Nouvelle relation utilisée dans with('order.items.product') pour le côté flutter
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function livraison()
    {
        return $this->hasOne(Livraison::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
