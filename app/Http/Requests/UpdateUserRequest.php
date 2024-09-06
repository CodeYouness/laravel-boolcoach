<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'language' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'url_img' => ['nullable', 'string', 'max:2083'],
            'summary' => ['nullable', 'string', 'max:5000']
        ];
    }
}
