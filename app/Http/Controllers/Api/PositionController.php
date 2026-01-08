<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function store(Request $request, $livraisonId)
    {
        $request->validate([
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'accuracy' => 'nullable|numeric',
        ]);

        $position = Position::create([
            'livraison_id' => $livraisonId,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'accuracy' => $request->accuracy,
            'captured_at' => now(),
        ]);

        return response()->json($position, 201);
    }

    public function index(Request $request, $livraisonId)
    {
        return response()->json(
            Position::where('livraison_id', $livraisonId)
                ->orderBy('captured_at', 'desc')
                ->get()
        );
    }
}
