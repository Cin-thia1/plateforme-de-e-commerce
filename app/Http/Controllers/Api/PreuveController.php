<?php

namespace App\Http\Controllers\Api;

use App\Models\Livraison;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PreuveController extends Controller
{
    public function store(Request $request, $livraisonId)
    {
        $livraison = Livraison::findOrFail($livraisonId);

        $request->validate([
            'type' => 'required|in:PHOTO,SIGNATURE,QR',
            'file' => 'required_if:type,PHOTO,SIGNATURE|image|max:2048',
            'qr_value' => 'required_if:type,QR'
        ]);

        return DB::transaction(function () use ($request, $livraison) {
            // 1. Enregistrer la preuve
            $path = $request->hasFile('file') ? $request->file('file')->store('preuves', 'public') : null;
            
            $preuve = $livraison->preuves()->create([
                'type' => $request->type,
                'file_url' => $path ? Storage::url($path) : null,
                'qr_value' => $request->qr_value
            ]);

            // 2. Mettre à jour la livraison (Automatique après preuve)
            $livraison->update([
                'status' => 'terminé',
                'date_livraison' => now()
            ]);

            // 3. NOTIFIER TOUS LES ADMINS
            $admins = User::where('type', 'admin')->get();
            foreach ($admins as $admin) {
                Notification::create([
                    'id_destinataire' => $admin->id,
                    'user_type' => 'admin',
                    'commentaire' => "La livraison {$livraison->id} a été terminée par le livreur.",
                    'lu' => 'non'
                ]);
            }

            return response()->json([
                'message' => 'Preuve enregistrée et livraison terminée.',
                'preuve' => $preuve
            ], 201);
        });
    }
}