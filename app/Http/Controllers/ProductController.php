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
            'productName'       => 'required|string|max:255',
            'brand'             => 'required|string|max:255',
            'category'          => 'required|string|max:255',
            'subCategory'       => 'required|string|max:255',
            'stock'             => 'required|integer|min:0',
            'price'             => 'required|numeric|min:0',
            'smallDescription' => 'required|string|max:255',
            'description'       => 'required|string',
            'images'            => 'required|array|min:1',
            'images.*'          => 'image|mimes:jpeg,png,jpg,gif,webp|max:5048',
        ]);

        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $images[] = $path; 
            }
        }

        Product::create([
            'name'              => $request->productName,
            'brand'             => $request->brand,
            'category'          => $request->category,
            'sub_category'       => $request->subCategory,
            'stock'             => $request->stock,
            'price'             => $request->price,
            'small_description' => $request->smallDescription,
            'description'       => $request->description,
            'images'            => $images, 
        ]);

        return response()->json(['message' => 'Produit ajouté avec succès !'], 201);
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product-form', compact('product'));
    }

public function index(Request $request)
{
    $query = Product::query();

    // Filtre catégorie
    if ($request->filled('categories')) {
        $query->whereIn('category', $request->categories);
    }

    // Filtre marque
    if ($request->filled('brands')) {
        $query->whereIn('brand', $request->brands);
    }

    // Filtre min/max
    if ($request->filled('min')) {
        $query->where('price', '>=', $request->min);
    }
    if ($request->filled('max')) {
        $query->where('price', '<=', $request->max);
    }

    // Filtre pour radio
    if ($request->filled('price_range') && $request->price_range !== 'Tout prix') {
        $range = str_replace(' ', '', $request->price_range);

        if (strpos($range, '-') !== false) {
            list($minPrice, $maxPrice) = explode('-', $range);

            $query->whereBetween('price', [(int)$minPrice, (int)$maxPrice]);
        }
        
    }

    $products = $query->latest()->get();


    return view('liste-produit', compact('products'));
}
 
    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $product->update([
        'name'              => $request->productName,
        'brand'             => $request->brand,
        'category'          => $request->category,
        'sub_category'      => $request->subCategory,
        'stock'             => $request->stock,
        'price'             => $request->price,
        'small_description' => $request->smallDescription,
        'description'       => $request->description,
    ]);

    $currentImages = $product->images ?? []; 

    // 1. Supprimer les images que l'utilisateur a retirées
    if ($request->has('deleted_images')) {
        foreach ($request->deleted_images as $pathToDelete) {
            Storage::delete('public/' . $pathToDelete);
            $currentImages = array_diff($currentImages, [$pathToDelete]);
        }
    }

    // 2. Ajouter les nouvelles images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {
            $path = $file->store('products', 'public');
            $currentImages[] = $path;
        }
    }

    // 3. Sauvegarder le tableau final
    $product->images = array_values($currentImages); 
    $product->save();

    return response()->json(['message' => 'Produit modifié avec succès !']);
}


public function destroy($id)
{
    $product = Product::findOrFail($id);

    // Suppression des images physiques
    if ($product->images && is_array($product->images)) {
        foreach ($product->images as $imagePath) {
            // $imagePath = "products/xxx.jpg"
            Storage::disk('public')->delete($imagePath);
        }
    }

    $product->delete();

    return response()->json([
        'success' => true,
        'message' => 'Produit supprimé avec succès !'
    ]);

    return view('liste-produit', compact('products'));
}




}