<?php


namespace App\Contracts;


interface MessageStore
{
    function store(string $name, string $phone, string $text);
}
