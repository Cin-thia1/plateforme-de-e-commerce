<?php

namespace App\Events;

use App\Models\Notification;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class NotificationCreated implements ShouldBroadcast
{
    use SerializesModels;

    private int $userId;
    private array $data;

    public function __construct(Notification $notification)
    {
        $this->userId = (int) $notification->id_destinataire;

        $this->data = [
            'id' => (string) $notification->id,
            'commentaire' => $notification->commentaire,
            'created_at' => $notification->created_at?->toISOString(),
            'lu' => $notification->lu, // "oui"/"non"
        ];
    }

    public function broadcastOn(): PrivateChannel
    {
        // ⚠️ IMPORTANT: côté client => "private-notifications.{id}"
        return new PrivateChannel('notifications.' . $this->userId);
    }

    public function broadcastAs(): string
    {
        return 'notification.created';
    }

    public function broadcastWith(): array
    {
        // ✅ PLUS de wrapper "payload"
        return $this->data;
    }
}
