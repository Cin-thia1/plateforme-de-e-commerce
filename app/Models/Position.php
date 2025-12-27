<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Position extends Model
{
    use HasUuids;

    // Désactive les timestamps classiques (created_at/updated_at) 
    // car tu utilises 'captured_at'
    public $timestamps = false;

    protected $fillable = [
        'livraison_id',
        'lat',
        'lng',
        'accuracy',
        'captured_at'
    ];

    public function livraison()
    {
        return $this->belongsTo(Livraison::class, 'livraison_id');
    }
}