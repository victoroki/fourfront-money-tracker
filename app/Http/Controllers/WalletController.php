<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWalletRequest;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\JsonResponse;

class WalletController extends Controller
{
    /**
     * POST /api/users/{user}/wallets
     *
     * Create a new wallet for the specified user.
     * Returns the created wallet with HTTP 201 Created.
     */
    public function store(StoreWalletRequest $request, User $user): JsonResponse
    {
        // Associate the new wallet with the resolved User model
        $wallet = $user->wallets()->create($request->validated());

        return response()->json([
            'message' => 'Wallet created successfully.',
            'data'    => $wallet,
        ], 201);
    }

    /**
     * GET /api/wallets/{wallet}
     *
     * Return a single wallet with:
     *  - Its computed balance (income minus expenses)
     *  - All transactions belonging to this wallet
     */
    public function show(Wallet $wallet): JsonResponse
    {
        // Eager-load transactions so the balance accessor doesn't trigger extra queries
        $wallet->load('transactions');

        return response()->json([
            'data' => [
                'id'           => $wallet->id,
                'user_id'      => $wallet->user_id,
                'name'         => $wallet->name,
                'balance'      => $wallet->balance, // computed via accessor
                'created_at'   => $wallet->created_at,
                'updated_at'   => $wallet->updated_at,
                'transactions' => $wallet->transactions,
            ],
        ]);
    }
}
