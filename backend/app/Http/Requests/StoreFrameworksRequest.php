<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreFrameworksRequest extends FormRequest
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
            'name' => ['required'],
            'level' => ['required','alpha'],
            'year' => ['required', 'integer', 'min:1960', 'max:2023'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del framework es requerido',
            'level.required' => 'El nivel del framework es requerido',
            'level.alpha' => 'El nivel del framework debe ser alfabético',
            'year.required' => 'El año del framework es requerido',
            'year.integer' => 'El año del framework debe ser un número entero',
            'year.min' => 'El año del framework debe ser mayor a 1960',
            'year.max' => 'El año del framework debe ser menor a 2023',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
