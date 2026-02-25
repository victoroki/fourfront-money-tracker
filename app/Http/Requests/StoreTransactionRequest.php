<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    /**
     * No authentication is required for this API.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for adding a transaction to a wallet.
     *
     * - type:        required; must be exactly 'income' or 'expense'
     * - amount:      required; must be numeric and strictly greater than 0
     * - description: optional free-text note for the transaction
     */
    public function rules(): array
    {
        return [
            'type'        => ['required', 'in:income,expense'],
            'amount'      => ['required', 'numeric', 'gt:0'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Human-friendly error messages.
     */
    public function messages(): array
    {
        return [
            'type.in'    => 'Transaction type must be either "income" or "expense".',
            'amount.gt'  => 'Amount must be a positive number greater than 0.',
        ];
    }
}
