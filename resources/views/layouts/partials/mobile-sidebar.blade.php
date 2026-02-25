<!-- Mobile sidebar overlay -->
<div class="lg:hidden fixed inset-0 z-mobile-backdrop" 
     x-show="sidebarOpen"
     x-transition:enter="transition-opacity ease-linear duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-linear duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="sidebarOpen = false">
    <div class="absolute inset-0 bg-gray-600 bg-opacity-75"></div>
</div>

<!-- Mobile sidebar -->
<div class="lg:hidden fixed inset-y-0 left-0 z-sidebar max-w-full w-80"
     x-show="sidebarOpen"
     x-transition:enter="transition ease-in-out duration-300 transform"
     x-transition:enter-start="-translate-x-full"
     x-transition:enter-end="translate-x-0"
     x-transition:leave="transition ease-in-out duration-300 transform"
     x-transition:leave-start="translate-x-0"
     x-transition:leave-end="-translate-x-full">
    
    <div class="flex flex-col h-full bg-white shadow-xl">
        <!-- Mobile header -->
        <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <x-application-logo class="h-8 w-auto" />
                </div>
                <h2 class="ml-3 text-xl font-semibold text-gray-900">Navigation</h2>
            </div>
            <button @click="sidebarOpen = false"
                    class="p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Mobile navigation -->
        <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
               @click="sidebarOpen = false"
               class="flex items-center px-3 py-3 text-base font-medium rounded-lg transition-colors"
               :class="{
                   'text-indigo-700 bg-indigo-50': request()->routeIs('dashboard'),
                   'text-gray-700 hover:bg-gray-100': !request()->routeIs('dashboard')
               }">
                <svg class="flex-shrink-0 h-6 w-6 mr-3" 
                     :class="{
                         'text-indigo-600': request()->routeIs('dashboard'),
                         'text-gray-500': !request()->routeIs('dashboard')
                     }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
            
            <!-- Wallets -->
            <a href="{{ route('wallets.index') }}"
               @click="sidebarOpen = false"
               class="flex items-center px-3 py-3 text-base font-medium rounded-lg transition-colors"
               :class="{
                   'text-indigo-700 bg-indigo-50': request()->routeIs('wallets.*'),
                   'text-gray-700 hover:bg-gray-100': !request()->routeIs('wallets.*')
               }">
                <svg class="flex-shrink-0 h-6 w-6 mr-3" 
                     :class="{
                         'text-indigo-600': request()->routeIs('wallets.*'),
                         'text-gray-500': !request()->routeIs('wallets.*')
                     }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                </svg>
                Wallets
            </a>
            
            <!-- Transactions -->
            <a href="{{ route('transactions.index') }}"
               @click="sidebarOpen = false"
               class="flex items-center px-3 py-3 text-base font-medium rounded-lg transition-colors"
               :class="{
                   'text-indigo-700 bg-indigo-50': request()->routeIs('transactions.*'),
                   'text-gray-700 hover:bg-gray-100': !request()->routeIs('transactions.*')
               }">
                <svg class="flex-shrink-0 h-6 w-6 mr-3" 
                     :class="{
                         'text-indigo-600': request()->routeIs('transactions.*'),
                         'text-gray-500': !request()->routeIs('transactions.*')
                     }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Transactions
            </a>
            
            <!-- Users (Admin only) -->
            @if(Auth::user()->hasRole('admin'))
            <a href="{{ route('users.index') }}"
               @click="sidebarOpen = false"
               class="flex items-center px-3 py-3 text-base font-medium rounded-lg transition-colors"
               :class="{
                   'text-indigo-700 bg-indigo-50': request()->routeIs('users.*'),
                   'text-gray-700 hover:bg-gray-100': !request()->routeIs('users.*')
               }">
                <svg class="flex-shrink-0 h-6 w-6 mr-3" 
                     :class="{
                         'text-indigo-600': request()->routeIs('users.*'),
                         'text-gray-500': !request()->routeIs('users.*')
                     }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                </svg>
                Users
            </a>
            @endif
        </nav>
        
        <!-- Mobile user profile section -->
        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0">
                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                        <span class="text-indigo-800 text-lg font-medium">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </span>
                    </div>
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-900">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ Auth::user()->role->display_name ?? 'User' }}
                    </div>
                </div>
            </div>
            
            <div class="space-y-2">
                <a href="{{ route('profile.edit') }}"
                   @click="sidebarOpen = false"
                   class="flex items-center px-3 py-2.5 text-base font-medium text-gray-700 rounded-md hover:bg-gray-100 transition-colors">
                    <svg class="flex-shrink-0 h-5 w-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Profile
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit"
                            @click="sidebarOpen = false"
                            class="w-full flex items-center px-3 py-2.5 text-base font-medium text-gray-700 rounded-md hover:bg-gray-100 transition-colors">
                        <svg class="flex-shrink-0 h-5 w-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Sign out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>