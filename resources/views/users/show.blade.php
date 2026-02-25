<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Details: ') }} {{ $user->name }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('users.edit', $user) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                    Edit User
                </a>
                <a href="{{ route('users.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- User Profile Info -->
                <div class="md:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Profile Information</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase tracking-wider">Full Name</label>
                                <p class="text-gray-900 border-b pb-1">{{ $user->name }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase tracking-wider">Email Address</label>
                                <p class="text-gray-900 border-b pb-1">{{ $user->email }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase tracking-wider">Role</label>
                                <p class="mt-1">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $user->role->display_name ?? 'N/A' }}
                                    </span>
                                </p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase tracking-wider">Member Since</label>
                                <p class="text-gray-900">{{ $user->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>

                        <div class="mt-8 pt-8 border-t">
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1">Total Net Worth</label>
                            <div class="text-3xl font-extrabold text-green-600">${{ number_format($user->total_balance, 2) }}</div>
                        </div>
                    </div>
                </div>

                <!-- User Wallets -->
                <div class="md:col-span-2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold">User Wallets</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @forelse($user->wallets as $wallet)
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-bold text-gray-900">{{ $wallet->name }}</h4>
                                        <a href="{{ route('wallets.show', $wallet) }}" class="text-xs text-indigo-600 hover:underline">View Details</a>
                                    </div>
                                    <div class="text-2xl font-semibold text-gray-800">${{ number_format($wallet->balance, 2) }}</div>
                                    <div class="text-xs text-gray-500 mt-2">{{ $wallet->transactions->count() }} transactions linked</div>
                                </div>
                            @empty
                                <div class="col-span-2 text-center py-8 text-gray-500 border-2 border-dashed rounded-lg">
                                    This user has no wallets yet.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
