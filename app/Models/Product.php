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
        'category_id',
        'sub_category_id',
        'stock',
        'price',
        'small_description',
        'description',
        'image_path'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
