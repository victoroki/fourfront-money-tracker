<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * POST /api/users
     *
     * Create a new user with a name and unique email.
     * Returns the created user with HTTP 201 Created.
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        // Validated data is already sanitised by StoreUserRequest
        $user = User::create($request->validated());

        return response()->json([
            'message' => 'User created successfully.',
            'data'    => $user,
        ], 201);
    }

    /**
     * GET /api/users/{user}
     *
     * Return the user's profile including:
     *  - All wallets with their computed balances
     *  - Total balance across all wallets
     *
     * Transactions are eager-loaded so balance accessors work without N+1 queries.
     */
    public function show(User $user): JsonResponse
    {
        // Eager-load wallets and their transactions to avoid N+1 queries
        $user->load('wallets.transactions');

        // Build a wallet list with balance attached to each entry
        $wallets = $user->wallets->map(function ($wallet) {
            return [
                'id'          => $wallet->id,
                'name'        => $wallet->name,
                'balance'     => $wallet->balance,  // computed via accessor
                'created_at'  => $wallet->created_at,
                'updated_at'  => $wallet->updated_at,
            ];
        });

        return response()->json([
            'data' => [
                'id'            => $user->id,
                'name'          => $user->name,
                'email'         => $user->email,
                'created_at'    => $user->created_at,
                'updated_at'    => $user->updated_at,
                'wallets'       => $wallets,
                'total_balance' => $user->total_balance, // sum of all wallet balances
            ],
        ]);
    }
}
