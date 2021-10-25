<?php

namespace App\Services;

use App\Contracts\MessageStore;
use App\Models\Message;

class MessageStoreDB implements MessageStore
{
    function store(string $name, string $phone, string $text)
    {
        $message = new Message;
        $message->name = $name;
        $message->phone = $phone;
        $message->text = $text;
        $message->save();
    }
}
