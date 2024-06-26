<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class SignupRequest extends FormRequest
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
                'username' => 'required|string|min:4|max:18|unique:users',
                'name' => 'required|string|min:2|max:24',
                'email' => 'required|email|regex:/^.+@.+\..+$/|unique:users',
                'birthday' => 'required|date|before_or_equal:today|after: -100 years|before: -14 years',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ];
    }


    public function messages()
    {
        return [
            'username.required' => 'El nombre de usuario es obligatorio',
            'username.min' => 'El nombre de usuario debe tener como mínimo 4 carácteres',
            'username.max' => 'El nombre de usuario debe tener como máximo 18 carácteres',
            'username.unique' => 'El nombre de usuario ya existe',
            'name.required' => 'El nombre completo es obligatorio',
            'name.min' => 'El nombre completo debe tener como mínimo 2 caracteres',
            'name.max' => 'El nombre completo debe tener como máximo 18 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo debe ser una dirección de correo electrónico válida',
            'email.regex' => 'El correo electrónico debe contener @',
            'email.unique' => 'El correo electrónico ya está registrado',
            'birthday.required' => 'La fecha de nacimiento es obligatoria',
            'birthday.before_or_equal' => 'La fecha de nacimiento no puede ser posterior a la actual',
            'birthday.after' => 'Ha habido un error, introduce una fecha válida',
            'birthday.before' => 'Debes tener al menos 14 años para poder registrarte',
            'password.required' => 'La contraseña es obligatoria',
            'password.confirmed' => 'No coincide la contraseña',
        ];
    }
}
