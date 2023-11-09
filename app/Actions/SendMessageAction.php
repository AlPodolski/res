<?php

namespace App\Actions;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\UserChat;

class SendMessageAction
{
    /**
     * @param $text
     * @param $from
     * @param $relatedClass
     * @param $relatedId
     * @return ChatMessage|false
     */
    public function send($text, $from, $relatedClass = null, $relatedId = null)
    {
        $dialog = $this->getOrCreateDialog($from);

        if ($message = $this->createMessage($text, $dialog->chat_id, $from, $relatedClass, $relatedId)) return $message;

        return false;

    }

    public function createMessage($text, $chatId, $from, $relatedClass = null, $relatedId = null)
    {

        $message = new ChatMessage();

        $message->message = $text;
        $message->from = $from;
        $message->chat_id = $chatId;
        $message->related_class = $relatedClass;
        $message->related_id = $relatedId;

        if ($message->save()) return $message;

        return false;

    }

    private function getOrCreateDialog($userId){

        if ($userDialog = UserChat::where('user_id', $userId)->first()) return $userDialog;

        else{

            $newChat = Chat::create();

            $userDialog = UserChat::create(['user_id' => $userId, 'chat_id' => $newChat->id]);

            return $userDialog;

        }

    }

}
