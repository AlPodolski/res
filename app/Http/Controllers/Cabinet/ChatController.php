<?php

namespace App\Http\Controllers\Cabinet;

use App\Actions\SendMessageAction;
use App\Models\ChatMessage;
use App\Models\Files;
use App\Models\UserChat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function index()
    {
        $chat = UserChat::where('user_id', auth()->user()->id)->with('message')->first();

        if ($chat)
            ChatMessage::where(['chat_id' => $chat->chat_id, 'from' => ChatMessage::ADMIN_ID])
                ->update(['status' => ChatMessage::READ_STATUS]);

        $notReadMessage = UserChat::where('user_id', auth()->user()->id)
            ->with('notRead')->first();

        return view('cabinet.chat.index', compact('chat', 'notReadMessage'));

    }

    public function send(Request $request)
    {
        $text = $request->post('message');

        return (new SendMessageAction())->send($text, auth()->user()->id);
    }

    public function file(Request $request)
    {

        $fileInfo = $request->file('chatFile');

        $dir = \substr(\md5($fileInfo->getFilename()), 0, 3);

        $fileOnDisk = $fileInfo->store('/uploads/' . $dir, 'public');

        if ($fileOnDisk){

            $message = (new SendMessageAction())->send(null, auth()->user()->id,  Files::class, 0);

            $file = new Files();

            $file->file = $fileOnDisk;
            $file->related_class = ChatMessage::class;
            $file->type = Files::CHAT;
            $file->related_id = $message->id;

            $file->save();

            $message->related_id = $file->id;

            $message->save();

            return view('cabinet.chat.photo', ['file' => $file->file]);

        }

    }

}
