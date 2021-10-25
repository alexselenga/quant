<?php

namespace App\Services;

use App\Contracts\MessageStore;
use Illuminate\Support\Facades\Storage;

class MessageStoreDisk implements MessageStore
{
    function store(string $name, string $phone, string $text)
    {
        $message = implode('|', [$name, $phone, $text])."\n";

        if (Storage::exists('localStore.txt')) {
            $content = Storage::get('localStore.txt');
        } else {
            $content = '';
        }

        $content .= $message;
        Storage::put('localStore.txt', $content);
    }
}
