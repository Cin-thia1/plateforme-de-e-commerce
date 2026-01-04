<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids; // Important pour l'UUID
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livraison extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'order_id',
        'livreur_id',
        'status',
        'en_route',
        'en_cours',
        'livrée',
        'echec_livraison',
        'raison_echec',
        'commentaire_echec',
    ];

    // Relations
    public function livreur()
    {
        return $this->belongsTo(Livreur::class, 'livreur_id', 'user_id');
    }

    public function positions()
    {
        return $this->hasMany(Position::class, 'livraison_id');
    }
    /**
     * Relation avec la Livraison
     */
    public function livraison()
    {
        return $this->hasOne(Livraison::class, 'order_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}