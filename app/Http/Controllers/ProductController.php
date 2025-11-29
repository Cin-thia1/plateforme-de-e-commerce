<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'productName'        => 'required|string|max:255',
            'brand'              => 'required|string|max:255',
            'category'           => 'required|string|max:255',
            'subCategory'        => 'required|string|max:255',
            'stock'              => 'required|integer|min:0',
            'price'              => 'required|numeric|min:0',
            'smallDescription'   => 'required|string|max:255',
            'description'        => 'required|string',
            'images'             => 'required|array|min:1',
            'images.*'           => 'image|mimes:jpeg,png,jpg,gif,webp|max:5048',
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $images[] = Storage::url($path);
            }
        }

        Product::create([
            'name'              => $request->productName,
            'brand'             => $request->brand,
            'category'          => $request->category,
            'sub_category'      => $request->subCategory,
            'stock'             => $request->stock,
            'price'             => $request->price,
            'small_description' => $request->smallDescription,
            'description'       => $request->description,
            'images'            => $images,
        ]);

        return response()->json(['message' => 'Produit ajouté avec succès !'], 201);
    }

    public function index()
    {
        $products = Product::latest()->get();
        return view('liste-produit', compact('products'));
    }
}