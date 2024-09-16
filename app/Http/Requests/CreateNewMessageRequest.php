<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewMessageRequest extends FormRequest
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
            'coach_id'=> 'required|integer',
            'username' => 'required|string|min:3|max:50',
            'email' => 'required|email|min:3',
            'title' => 'required|string|min:3|max:50',
            'content' => 'required|string|min:3'
        ];
    }
}
