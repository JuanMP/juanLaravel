<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class MessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|string|min:2|max:30|regex:/^[a-zA-Z]+[a-zA-Z0-9]*$/',
            'subject' => 'required|string|max:100',
            'text' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debes introducir un nombre',
            'name.min' => 'El nombre debe tener mínimo 2 carácteres',
            'name.max' => 'El nombre debe tener como máximo 30 carácteres',
            'name.regex' => 'El nombre debe contener al menos una letra y puede incluir números.',
            'subject.required' => 'Debes introducir un asunto',
            'subject.max' => 'El asunto no puede tener más de 100 carácteres',
            'text.required' => 'Debes introducir un texto',
        ];
    }
}
