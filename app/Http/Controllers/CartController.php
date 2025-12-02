<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function getProducts(Request $request)
    {
        $ids = $request->ids ?? [];

        // Toujours sécuriser
        if (!is_array($ids)) {
            return response()->json([]);
        }

        $products = Product::whereIn('id', $ids)->get();

        return response()->json($products);
    }
}
