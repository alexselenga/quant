<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $name string
 * @property $phone string
 * @property $text string
 */
class Message extends Model
{
    use HasFactory;
}
