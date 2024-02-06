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

            'name' => 'required|string|max:20',
            'position' => 'required|string|',
            'number' => 'integer',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Introduce el nombre del jugador',
            'name.max' => 'El nombre no puede contener más de 20 carácteres',
            'position.required' => 'La posición es obligatoria',
            'number.integer' => 'Debes añadir un número',
        ];
    }
}
