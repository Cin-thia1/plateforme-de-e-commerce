<?php
// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function getProducts(Request $request)
    {
        $items = $request->items; // [ {id:12, qty:2}, ...]

        $ids = collect($items)->pluck('id');

        $products = Product::whereIn('id', $ids)->get();

        // Merge qty
        $products = $products->map(function($p) use ($items) {
            $qty = collect($items)->firstWhere('id', $p->id)['qty'] ?? 1;
            return [
                "id" => $p->id,
                "name" => $p->name,
                "price" => $p->price,
                "image" => $p->image,
                "qty" => $qty,
                "small_description" => $p->small_description
            ];
        });

        return response()->json([
            "products" => $products
        ]);
    }
}
?>
