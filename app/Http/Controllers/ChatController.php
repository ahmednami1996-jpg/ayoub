<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use App\Services\ConversationsService;
class ChatController extends Controller
{
     protected $conversations;

    public function __construct(ConversationsService $conversationsService)
    {
        $this->conversations = $conversationsService;
    }

    public function chatList(){
        $chats=$this->conversations->getConversations();


       
        return view('backend.chat.chat_list',compact('chats'));
    }
    public function chat($receiverId)
    {
       
       
        if(auth()->id()==$receiverId){
            $notification=array("message"=>"vous ne pouvez pas  discuter avec vous meme","alert-type"=>"warning");
            return back()->with($notification);
        }
        
        $receiver = User::find($receiverId);

        $messages = Message::where(function ($query) use ($receiverId){
            $query->where('sender_id', Auth::id())->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)->where('receiver_id', Auth::id());
        })->orderBy("created_at","asc")->get();

        return view('chat', compact('receiver', 'messages'));
    }

    public function sendMessage(Request $request, $receiverId)
    {
     
        $message = Message::create([
            'sender_id'     => Auth::id(),
            'receiver_id'   => $receiverId,
            'message'       => $request['message']
        ]);
        
       
        broadcast(new MessageSent($message))->toOthers();
        
        return response()->json(['status' => 'Message sent!']);
    }
}
