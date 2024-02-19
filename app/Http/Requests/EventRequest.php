<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            //Reglas para validar eventos
            'name' => 'required|string|min:2|max:30',
            'description' => 'required|string|max:200',
            'location' => 'required|string',
            'date' => 'required|date|after_or_equal:today',
            'hour' => 'required|date_format:H:i',
            'type' => 'required|in:official,exhibition,charity',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del evento es obligatorio',
            'name.min' => 'El nombre del evento debe tener mínimo 2 caracteres',
            'name.max' => 'El nombre del evento no puede superar los 30 caracteres',
            'description.required' => 'La descripción del evento es obligatoria',
            'description.max' => 'La descripción no puede tener más de 200 caracteres',
            'location.required' => 'La ubicación es obligatoria',
            'date.required' => 'La fecha es obligatoria',
            'date.after_or_equal' => 'La fecha del evento no puede ser anterior a la actual',
            'hour.required' => 'La hora del evento es obligatoria',
            'type.required' => 'El tipo de evento es obligatorio',
            'type.in' => 'El tipo de evento no es válido',
        ];
    }
}
