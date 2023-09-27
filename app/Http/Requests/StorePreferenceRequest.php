<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePreferenceRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'notify_emails' => ['required', 'boolean'],
            'notify_whatsapp' => ['required', 'boolean'],
            'background_color' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'O campo é obrigatório',
            'user_id.integer' => 'O campo deve ser um inteiro',
            'user_id.exists' => 'O campo deve existir na tabela users',
            'notify_emails.required' => 'O campo é obrigatório',
            'notify_emails.boolean' => 'O campo deve ser um booleano',
            'notify_whatsapp.required' => 'O campo é obrigatório',
            'notify_whatsapp.boolean' => 'O campo deve ser um booleano',
            'background_color.required' => 'O campo é obrigatório',
            'background_color.string' => 'O campo deve ser uma string',
        ];
    }
}
