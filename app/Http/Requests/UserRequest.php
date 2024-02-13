<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:20',
            'birthday' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debes introducir un nuevo nombre',
            'name.min' => 'El nombre debe tener mínimo 2 carácteres',
            'name.max' => 'El nombre no puede tener más de 20 carácteres',
            'birthday' => 'La fecha de nacimiento es obligatoria',
        ];
    }
}
