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
        'client_id'
    ];

    protected $casts = [
        'date' => 'date',
        'livree' => 'boolean',
    ];

    /**
     * Relation avec User (le client)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    /**
     * Relation avec OrderItem
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
