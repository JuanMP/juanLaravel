<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlayerRequest extends FormRequest
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
            //REGLAS DE VALIDACION PARA NUEVOS JUGADORES

            'name' => 'required|string|max:30|regex:/^[^\d]+$/',
            'position' => 'required|string|max:3|regex:/^[^\d]+$/',
            'number' => 'nullable|integer',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitch' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'visibility' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del jugador es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede contener más de 30 caracteres.',
            'name.regex' => 'El nombre no puede contener números.',
            'position.required' => 'La posición del jugador es obligatoria.',
            'position.string' => 'La posición debe ser una cadena de texto.',
            'position.max' => 'La posición no puede contener más de 3 caracteres.',
            'position.regex' => 'La posición no puede tener números',
            'number.integer' => 'El dorsal debe ser un número entero.',
            'twitter.string' => 'El enlace de Twitter debe ser una cadena de texto.',
            'twitter.max' => 'El enlace de Twitter no puede contener más de 255 caracteres.',
            'instagram.string' => 'El enlace de Instagram debe ser una cadena de texto.',
            'instagram.max' => 'El enlace de Instagram no puede contener más de 255 caracteres.',
            'twitch.string' => 'El enlace de Twitch debe ser una cadena de texto.',
            'twitch.max' => 'El enlace de Twitch no puede contener más de 255 caracteres.',
            'photo.image' => 'El archivo adjunto debe ser una imagen.',
            'photo.mimes' => 'El archivo adjunto debe ser de tipo: jpeg, png, jpg o gif.',
            'visibility.boolean' => 'El campo de visibilidad debe ser un valor booleano.',
        ];
    }
}
