<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductAPIController extends Controller
{
    /**
     * GET /products
     * Liste avec filtres (Catégorie, Marque, Prix)
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('categories')) {
            $query->whereIn('category', (array)$request->categories);
        }

        if ($request->filled('brands')) {
            $query->whereIn('brand', (array)$request->brands);
        }

        if ($request->filled('min')) {
            $query->where('price', '>=', $request->min);
        }

        if ($request->filled('max')) {
            $query->where('price', '<=', $request->max);
        }

        // Recherche (fusionnée avec l'index pour l'API)
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($sub) use ($q) {
                $sub->where('name', 'LIKE', "%$q%")
                    ->orWhere('brand', 'LIKE', "%$q%")
                    ->orWhere('category', 'LIKE', "%$q%");
            });
        }

        $products = $query->latest()->get();

        return response()->json([
            'success' => true,
            'count' => $products->count(),
            'data' => $products
        ]);
    }

    /**
     * POST /products
     * Création d'un produit avec images multiples
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'productName'      => 'required|string|max:255',
            'brand'            => 'required|string|max:255',
            'category'         => 'required|string|max:255',
            'subCategory'      => 'required|string|max:255',
            'stock'            => 'required|integer|min:0',
            'price'            => 'required|numeric|min:0',
            'smallDescription' => 'required|string|max:255',
            'description'      => 'required|string',
            'images'           => 'required|array|min:1',
            'images.*'         => 'image|mimes:jpeg,png,jpg,gif,webp|max:5048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $imagePaths[] = $path;
            }
        }

        $product = Product::create([
            'name'              => $request->productName,
            'brand'             => $request->brand,
            'category'          => $request->category,
            'sub_category'      => $request->subCategory,
            'stock'             => $request->stock,
            'price'             => $request->price,
            'small_description' => $request->smallDescription,
            'description'       => $request->description,
            'images'            => $imagePaths,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produit ajouté avec succès !',
            'data' => $product
        ], 201);
    }

    /**
     * GET /products/{id}
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }
        return response()->json($product);
    }

    /**
     * POST /products/{id} (avec _method=PUT)
     * Mise à jour
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name'              => $request->productName ?? $product->name,
            'brand'             => $request->brand ?? $product->brand,
            'category'          => $request->category ?? $product->category,
            'sub_category'      => $request->subCategory ?? $product->sub_category,
            'stock'             => $request->stock ?? $product->stock,
            'price'             => $request->price ?? $product->price,
            'small_description' => $request->smallDescription ?? $product->small_description,
            'description'       => $request->description ?? $product->description,
        ]);

        $currentImages = $product->images ?? [];

        // Supprimer des images spécifiques
        if ($request->filled('deleted_images')) {
            $deletedImages = is_array($request->deleted_images) ? $request->deleted_images : json_decode($request->deleted_images);
            foreach ($deletedImages as $pathToDelete) {
                Storage::disk('public')->delete($pathToDelete);
                $currentImages = array_diff($currentImages, [$pathToDelete]);
            }
        }

        // Ajouter nouvelles images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products', 'public');
                $currentImages[] = $path;
            }
        }

        $product->images = array_values($currentImages);
        $product->save();

        return response()->json([
            'success' => true,
            'message' => 'Produit modifié avec succès !',
            'data' => $product
        ]);
    }

    /**
     * DELETE /products/{id}
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->images) {
            foreach ($product->images as $path) {
                Storage::disk('public')->delete($path);
            }
        }

        $product->delete();

        return response()->json(['success' => true, 'message' => 'Produit supprimé']);
    }
}