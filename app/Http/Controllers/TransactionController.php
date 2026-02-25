<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Wallet;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    /**
     * POST /api/wallets/{wallet}/transactions
     *
     * Record a new income or expense transaction for the specified wallet.
     *
     * The wallet's balance is NOT stored — it is always derived from all
     * transactions at query time, so no additional update step is needed here.
     *
     * Returns the created transaction with HTTP 201 Created.
     */
    public function store(StoreTransactionRequest $request, Wallet $wallet): JsonResponse
    {
        // Associate the transaction with the wallet resolved from the route
        $transaction = $wallet->transactions()->create($request->validated());

        return response()->json([
            'message' => 'Transaction recorded successfully.',
            'data'    => $transaction,
        ], 201);
    }
}
