<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'vehicle',
        'status',
        'order_id',
    ];

    /**
     * Orders assigned to this courier
     */
    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * If needed, access the assigned order (alias)
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
