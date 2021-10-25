<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $name string
 * @property $phone string
 * @property $text string
 */
class MessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'phone' => 'required|max:20',
            'text' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'phone' => 'Телефон',
            'text' => 'Обращение',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Заполните поле `:attribute`.',
            'max' => 'Длина поля `:attribute` не должна быть больше :max символов.',
        ];
    }
}
