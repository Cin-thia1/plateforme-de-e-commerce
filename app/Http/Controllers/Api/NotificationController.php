<?php

namespace App\Http\Controllers\Api;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        // Récupère les notifications de l'utilisateur connecté
        return Notification::where('id_destinataire', $request->user()->id)
                            ->orderBy('created_at', 'desc')
                            ->get();
    }

    public function markAsRead($id)
    {
        $notif = Notification::findOrFail($id);
        $notif->update(['lu' => 'oui']);
        
        return response()->json(['message' => 'Marquée comme lue']);
    }

    public function markAllAsRead(Request $request)
    {
        Notification::where('id_destinataire', $request->user()->id)
                    ->update(['lu' => 'oui']);
        
        return response()->json(['message' => 'Toutes les notifications marquées comme lues']);
    }
}