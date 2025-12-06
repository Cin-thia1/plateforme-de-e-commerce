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
                // Stocke dans storage/app/public/products
                $path = $image->store('products', 'public');
                // On garde SEULEMENT le chemin relatif → crucial pour le JSON
                $images[] = $path; // ← "products/xxx.jpg" (pas Storage::url())
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
            'images'            => $images, // ← Tableau simple de chemins
        ]);

        return response()->json(['message' => 'Produit ajouté avec succès !'], 201);
    }

    public function index()
    {
        $products = Product::latest()->get();
        return view('liste-produit', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product-form', compact('product'));
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

    $currentImages = $product->images ?? []; // tableau de chemins

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

        // Supprime les images du disque
        if ($product->images && is_array($product->images)) {
            foreach ($product->images as $imagePath) {
                // $imagePath = "products/xxx.jpg"
                Storage::delete('public/' . $imagePath);
            }
        }

        $product->delete();

        return response()->json(['message' => 'Produit supprimé avec succès !']);
    }
}