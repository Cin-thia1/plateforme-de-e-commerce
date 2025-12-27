<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
    protected $primaryKey = 'user_id'; // Définit user_id comme clé primaire
    public $incrementing = false;     // Désactive l'auto-incrément

    protected $fillable = [
        'user_id', 'photo', 'name', 'firstname', 'tel', 'dateNaissance', 
        'typeVehicule', 'zoneActivite', 'typeContrat', 'matricule'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

?>