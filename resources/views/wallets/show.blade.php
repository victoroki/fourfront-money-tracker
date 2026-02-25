<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Wallet: ') }} {{ $wallet->name }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('wallets.edit', $wallet) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                    Edit Wallet
                </a>
                <a href="{{ route('wallets.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Wallet Info Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Wallet Name</h3>
                    <div class="text-xl font-bold text-gray-900 mb-4">{{ $wallet->name }}</div>
                    
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Owner</h3>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="bg-gray-200 h-8 w-8 rounded-full flex items-center justify-center text-gray-700 font-bold">
                            {{ substr($wallet->user->name, 0, 1) }}
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-900 leading-none">{{ $wallet->user->name }}</div>
                            <div class="text-xs text-gray-500">{{ $wallet->user->email }}</div>
                        </div>
                    </div>

                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Created On</h3>
                    <div class="text-sm text-gray-900">{{ $wallet->created_at->format('M d, Y') }}</div>
                </div>

                <!-- Current Balance Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Current Balance</h3>
                    <div class="text-4xl font-extrabold text-green-600 mb-2">
                        ${{ number_format($wallet->balance, 2) }}
                    </div>
                    <div class="text-xs text-gray-500">
                        Based on {{ $wallet->transactions->count() }} transactions
                    </div>
                </div>

                <!-- Quick Stats Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Summary</h3>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm text-gray-600">Total Income:</span>
                        <span class="text-sm font-bold text-green-600">+${{ number_format($wallet->transactions->where('type', 'income')->sum('amount'), 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Total Expenses:</span>
                        <span class="text-sm font-bold text-red-600">-${{ number_format($wallet->transactions->where('type', 'expense')->sum('amount'), 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Transaction History -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Transaction History</h3>
                        <a href="{{ route('transactions.create', ['wallet_id' => $wallet->id]) }}" class="text-sm text-blue-600 hover:underline">Add Transaction</a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($wallet->transactions->sortByDesc('created_at') as $transaction)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaction->type === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($transaction->type) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold {{ $transaction->type === 'income' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $transaction->type === 'income' ? '+' : '-' }}${{ number_format($transaction->amount, 2) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $transaction->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('transactions.edit', $transaction) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No transactions recorded for this wallet.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
