<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'species' => ['required', 'in:cat,dog,cow,pig,chicken,duck,other'],
            'icon' => ['nullable'],
            'notes' => ['nullable'],
            'birthday_at' => ['nullable', 'date'],
            'bought_at' => ['nullable', 'date'],
            'sold_at' => ['nullable', 'date'],
            'death_at' => ['nullable', 'date'],
        ];
    }
}
