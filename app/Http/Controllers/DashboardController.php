<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_wallets' => Wallet::count(),
            'total_transactions' => Transaction::count(),
            'total_balance' => Wallet::all()->sum('balance'),
        ];

        $recent_transactions = Transaction::with('wallet.user')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'recent_transactions'));
    }
}
