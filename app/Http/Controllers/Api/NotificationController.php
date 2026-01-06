<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

/*class NotificationController extends Controller
{
    // GET /api/notifications?limit=50
    public function index(Request $request)
    {
        $user = $request->user();
        $limit = (int)($request->query('limit', 50));

        $rows = Notification::query()
            ->where('id_destinataire', $user->id)
            ->orderByDesc('created_at')
            ->limit($limit)
            ->get()
            ->map(function ($n) {
                return [
                    'id' => $n->id,
                    'title' => $n->user_type === 'admin' ? 'Notification' : 'Notification',
                    // on mappe "commentaire" -> "body" côté mobile
                    'body' => $n->commentaire ?? '',
                    'read' => ($n->lu === 'oui'),
                    'created_at' => $n->created_at,
                ];
            });

        return response()->json($rows);
    }

    // GET /api/notifications/unread-count
    public function unreadCount(Request $request)
    {
        $user = $request->user();

        $count = Notification::query()
            ->where('id_destinataire', $user->id)
            ->where('lu', 'non')
            ->count();

        return response()->json(['count' => $count]);
    }

    // PATCH /api/notifications/{id}/read
    public function markRead(Request $request, $id)
    {
        $user = $request->user();

        $n = Notification::query()
            ->where('id', $id)
            ->where('id_destinataire', $user->id)
            ->firstOrFail();

        $n->update(['lu' => 'oui']);

        return response()->json(['message' => 'OK']);
    }

    // PATCH /api/notifications/read-all
    public function markAllRead(Request $request)
    {
        $user = $request->user();

        Notification::query()
            ->where('id_destinataire', $user->id)
            ->where('lu', 'non')
            ->update(['lu' => 'oui']);

        return response()->json(['message' => 'OK']);
    }
}*/
class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $limit = (int) $request->query('limit', 50);

        return Notification::where('id_destinataire', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
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
            ->where('lu', 'non')
            ->update(['lu' => 'oui']);

        return response()->json(['message' => 'Toutes les notifications marquées comme lues']);
    }

    public function unreadCount(Request $request)
    {
        $count = Notification::where('id_destinataire', $request->user()->id)
            ->where('lu', 'non')
            ->count();

        return response()->json(['count' => $count]);
    }
}
