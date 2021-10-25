<?php

namespace App\Http\Controllers\Api;

use App\Contracts\MessageStore;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function store(MessageRequest $request, MessageStore $messageStore): array {
        $messageStore->store($request->name, $request->phone, $request->text);

        return ['status' => 'ok'];
    }
}
