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

    protected $casts = [
        'images' => 'array'
    ];
}