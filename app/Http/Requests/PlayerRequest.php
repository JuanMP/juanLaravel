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

            'name' => 'required|string|max:30',
            'position' => 'required|string|max:3',
            'number' => 'integer',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Introduce el nombre del jugador',
            'name.string' => 'El nombre debe tener letras',
            'name.max' => 'El nombre no puede contener más de 30 carácteres',
            'position.required' => 'La posición es obligatoria',
            'position.max' => 'La posición no puede tener más de 3 letras',
            'number.integer' => 'Debes añadir un número',
        ];
    }
}
