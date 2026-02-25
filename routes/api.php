<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Money Tracker API Routes
|--------------------------------------------------------------------------
|
| All routes are prefixed with /api automatically by the RouteServiceProvider
| (or bootstrap/app.php in Laravel 12 API configuration).
|
| No authentication middleware is applied — this API is publicly accessible.
|
*/

// ── User Routes ────────────────────────────────────────────────────────────

/**
 * POST /api/users
 * Create a new user account (name + unique email).
 */
Route::post('/users', [UserController::class, 'store']);

/**
 * GET /api/users/{user}
 * View a user's profile with all wallets, individual balances, and total balance.
 */
Route::get('/users/{user}', [UserController::class, 'show']);


// ── Wallet Routes ──────────────────────────────────────────────────────────

/**
 * POST /api/users/{user}/wallets
 * Create a new wallet for the specified user.
 */
Route::post('/users/{user}/wallets', [WalletController::class, 'store']);

/**
 * GET /api/wallets/{wallet}
 * View a single wallet including its balance and all transactions.
 */
Route::get('/wallets/{wallet}', [WalletController::class, 'show']);


// ── Transaction Routes ─────────────────────────────────────────────────────

/**
 * POST /api/wallets/{wallet}/transactions
 * Record an income or expense transaction for the specified wallet.
 */
Route::post('/wallets/{wallet}/transactions', [TransactionController::class, 'store']);
