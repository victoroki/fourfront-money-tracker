<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Transaction Receipt') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('transactions.edit', $transaction) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                    Edit
                </a>
                <a href="{{ route('transactions.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center h-16 w-16 rounded-full {{ $transaction->type === 'income' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} mb-4">
                            @if($transaction->type === 'income')
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            @else
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                </svg>
                            @endif
                        </div>
                        <h3 class="text-2xl font-bold {{ $transaction->type === 'income' ? 'text-green-600' : 'text-red-600' }}">
                            {{ $transaction->type === 'income' ? '+' : '-' }}${{ number_format($transaction->amount, 2) }}
                        </h3>
                        <p class="text-gray-500">{{ ucfirst($transaction->type) }} Transaction</p>
                    </div>

                    <div class="space-y-6">
                        <div class="grid grid-cols-2 border-b pb-4">
                            <span class="text-gray-500 font-medium">Date & Time</span>
                            <span class="text-gray-900 text-right">{{ $transaction->created_at->format('F d, Y - H:i:s') }}</span>
                        </div>
                        <div class="grid grid-cols-2 border-b pb-4">
                            <span class="text-gray-500 font-medium">Source Wallet</span>
                            <span class="text-indigo-600 text-right font-semibold">
                                <a href="{{ route('wallets.show', $transaction->wallet) }}">{{ $transaction->wallet->name }}</a>
                            </span>
                        </div>
                        <div class="grid grid-cols-2 border-b pb-4">
                            <span class="text-gray-500 font-medium">Account Owner</span>
                            <span class="text-gray-900 text-right">{{ $transaction->wallet->user->name }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-gray-500 font-medium mb-1">Description</span>
                            <div class="bg-gray-50 p-4 rounded-lg text-gray-700 italic">
                                {{ $transaction->description ?: 'No description provided.' }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-8 border-t text-center">
                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" onsubmit="return confirm('Delete this transaction permanentally?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:text-red-900 font-medium font-semibold">
                                Delete this transaction record
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
