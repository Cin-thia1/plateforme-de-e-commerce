<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Livraison;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PreuveController extends Controller
{
    // ✅ GET /api/livraisons/{id}/preuves
    public function index(Request $request, $livraisonId)
    {
        $livraison = Livraison::findOrFail($livraisonId);

        $preuves = $livraison->preuves()
            ->select(['id', 'livraison_id', 'type', 'file_url', 'qr_value', 'created_at', 'updated_at'])
            ->orderByDesc('created_at')
            ->get();

        return response()->json($preuves, 200);
    }

    // ✅ POST /api/livraisons/{id}/preuves
    public function store(Request $request, $livraisonId)
    {
        $livraison = Livraison::findOrFail($livraisonId);

        $request->validate([
            'type' => 'required|in:PHOTO,SIGNATURE,QR',
            'file' => 'required_if:type,PHOTO,SIGNATURE|file|mimes:jpg,jpeg,png|max:2048',
            'qr_value' => 'required_if:type,QR|string|max:191',
        ]);

        return DB::transaction(function () use ($request, $livraison) {

            // 1) Upload fichier si besoin
            $path = null;
            if ($request->hasFile('file')) {
                $path = $request->file('file')->store('preuves', 'public');
            }

            // 2) Enregistrer la preuve
            $preuve = $livraison->preuves()->create([
                'type' => $request->type,
                'file_url' => $path ? Storage::url($path) : null,
                'qr_value' => $request->type === 'QR' ? $request->qr_value : null,
            ]);

            // 3) Mettre à jour livraison -> livrée (si tu veux que toute preuve termine la livraison)
            $livraison->update([
                'status' => 'livrée',
                'livrée' => now(),
            ]);

            // 4) Notifier les admins (si ta table notifications est bien celle-là)
            $admins = User::where('type', 'admin')->get();
            foreach ($admins as $admin) {
                Notification::create([
                    'id_destinataire' => $admin->id,
                    'user_type' => 'admin',
                    'commentaire' => "La livraison {$livraison->id} a été terminée par le livreur.",
                    'lu' => 'non',
                ]);
            }

            return response()->json([
                'message' => 'Preuve enregistrée et livraison terminée.',
                'preuve' => $preuve,
            ], 201);
        });
    }
}
