<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

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
            'name' => ['required', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'],
            'last_name' => ['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'],
            'city' => ['required', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'],
            'country' => ['required', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'],
            'summary' => ['required'],
            'email' => ['required', 'email'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del usuario es requerido',
            'name.regex' => 'El nombre del usuario debe ser alfabético',
            'last_name.required' => 'El apellido del usuario es requerido',
            'last_name.regex' => 'El apellido del usuario debe ser alfabético',
            'city.required' => 'La ciudad del usuario es requerida',
            'city.regex' => 'La ciudad del usuario debe ser alfabética',
            'country.required' => 'El país del usuario es requerido',
            'country.regex' => 'El país del usuario debe ser alfabético',
            'summary.required' => 'La descripción del usuario es requerida',
            'email.required' => 'El email del usuario es requerido',
            'email.email' => 'El email del usuario debe ser válido',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
