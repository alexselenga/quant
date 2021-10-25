<?php

namespace App\Http\Controllers\Api;

use App\Contracts\MessageStore;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index() { //?
        return Message::all();
    }

    public function store(Request $request, MessageStore $messageStore) {
        $v = $request->validate([
            'name' => 'required|max:50',
            'phone' => 'required|max:20',
            'text' => 'required',
        ]);

        $messageStore->store($v['name'], $v['phone'], $v['text']);
    }
}
