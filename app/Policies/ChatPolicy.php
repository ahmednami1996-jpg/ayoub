<?php

namespace App\Policies;

use App\Models\User;

class ChatPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
     public function view(User $user, Chat $chat)
    {
        
        if($chat->sender_id === $user->id || $chat->receiver_id === $user->id){
            return true;
        }else{
            return view("not-authorize");
        }
    }

    public function create(User $user)
    {
        // Any authenticated user can send
         $user !== null;
    }

    public function update(User $user, Chat $chat)
    {
        // Only sender can update (optional)
        return $chat->sender_id === $user->id;
    }

    public function delete(User $user, Chat $chat)
    {
        // Only sender can delete
        return $chat->sender_id === $user->id;
    }
}
