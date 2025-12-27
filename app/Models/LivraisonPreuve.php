<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LivraisonPreuve extends Model
{
    use HasFactory, HasUuids;

    // Si le nom de la table ne suit pas la convention plurielle (livraison_preuves)
    protected $table = 'livraison_preuves';

    protected $fillable = [
        'livraison_id',
        'type',
        'file_url',
        'qr_value'
    ];

    /**
     * Relation vers la livraison parente
     */
    public function livraison()
    {
        return $this->belongsTo(Livraison::class, 'livraison_id');
    }
}