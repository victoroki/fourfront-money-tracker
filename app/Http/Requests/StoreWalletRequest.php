<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWalletRequest extends FormRequest
{
    /**
     * No authentication is required for this API.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for creating a new wallet.
     *
     * - name: required, non-empty string (e.g. "Business Account", "Personal Savings")
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
