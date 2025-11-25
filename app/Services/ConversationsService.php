<?php

namespace App\Services;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ConversationsService
{
    /**
     * Get user conversations with the latest message.
     *
     * @param int|null $limit
     * @return \Illuminate\Support\Collection
     */
    public function getConversations($limit = null)
    {
          $userId = auth()->id();

        // Get latest messages per sender
        $latestMessages = Message::where('receiver_id', $userId)
            ->orderByDesc('created_at')
            ->get()
            ->groupBy('sender_id')
            ->map(fn($msgs) => $msgs->first())
            ->sortByDesc('created_at');

        // Load all senders in one query
        $senderIds = $latestMessages->pluck('sender_id')->toArray();
        $senders = User::whereIn('id', $senderIds)
            ->select('id', 'username', 'picture')
            ->get()
            ->keyBy('id'); // key by user_id

        // Attach sender info to each message
        $latestMessages->transform(function ($msg) use ($senders) {
            $msg->sender = $senders[$msg->sender_id] ?? null; // attach User object
            return $msg;
        });

        return $limit ? $latestMessages->take($limit) : $latestMessages;
    }

}