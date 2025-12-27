<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Notification extends Model
{
    use HasUuids;

    protected $fillable = [
        'id_destinataire',
        'user_type',
        'lu',
        'commentaire'
    ];

    // Relation générique pour retrouver le destinataire (User)
    public function destinataire()
    {
        return $this->belongsTo(User::class, 'id_destinataire');
    }
}