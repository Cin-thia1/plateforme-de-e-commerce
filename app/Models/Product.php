<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'brand',
        'category',
        'sub_category',
        'stock',
        'price',
        'small_description',
        'description',
        'images'
    ];

    // CETTE LIGNE EST CRUCIALE
    protected $casts = [
        'images' => 'array',  // Laravel convertit automatiquement JSON ↔ array
        'price'  => 'decimal:2'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
