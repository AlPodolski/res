<?php

namespace App\Http\Controllers\Admin;

use App\Actions\SendMessageAction;
use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\UserChat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chatList = UserChat::with('last')->get();

        return view('admin.chat.index', compact('chatList'));
    }

    public function get(Request $request)
    {

        $chatId = $request->post('id');

        $chat = UserChat::where('chat_id', $chatId)->with('message')->first();

        ChatMessage::where(['chat_id' => $chat->chat_id])
            ->where('from','<>',  ChatMessage::ADMIN_ID)
            ->update(['status' => ChatMessage::READ_STATUS]);

        return view('admin.chat.item', compact('chat'));

    }

    public function send(Request $request)
    {
        $message = $request->post('message');
        $chatId = $request->post('id');

        if ((new SendMessageAction())->createMessage($message, $chatId, 0)) return $message;

        return 'Ошибка';

    }

}
