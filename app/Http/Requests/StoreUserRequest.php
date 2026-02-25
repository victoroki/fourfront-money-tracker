<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * No authentication is required for this API.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for creating a new user.
     *
     * - name:  required, non-empty string
     * - email: required, must be a valid email format, must be unique in the users table
     */
    public function rules(): array
    {
        return [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
        ];
    }

    /**
     * Human-friendly error messages.
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'A user with this email address already exists.',
        ];
    }
}
