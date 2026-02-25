<!-- Desktop Sidebar -->
<div class="hidden lg:block fixed inset-y-0 left-0 z-sidebar bg-white border-r border-gray-200 shadow-sidebar transition-all duration-300 ease-in-out"
     :class="{ 'w-sidebar': !sidebarCollapsed, 'w-sidebar-collapsed': sidebarCollapsed }">
    
    <div class="flex flex-col h-full">
        <!-- Logo and collapse button -->
        <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200">
            <div class="flex items-center" x-show="!sidebarCollapsed">
                <div class="flex-shrink-0">
                    <x-application-logo class="h-8 w-auto" />
                </div>
            </div>
            
            <div class="flex-shrink-0" x-show="sidebarCollapsed">
                <div class="bg-indigo-600 p-1.5 rounded-lg">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            
            <button @click="sidebarCollapsed = !sidebarCollapsed" 
                    class="ml-2 p-1 rounded-md hover:bg-gray-100 transition-colors">
                <svg class="h-5 w-5 text-gray-500" 
                     :class="{ 'rotate-180': sidebarCollapsed }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>
        
        <!-- Navigation -->
        <nav class="flex-1 px-2 py-4 space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors group"
               :class="{
                   'text-indigo-700 bg-indigo-50': request()->routeIs('dashboard'),
                   'text-gray-700 hover:bg-gray-100': !request()->routeIs('dashboard'),
                   'justify-center': sidebarCollapsed,
                   'justify-start': !sidebarCollapsed
               }">
                <svg class="flex-shrink-0 h-5 w-5" 
                     :class="{
                         'text-indigo-600': request()->routeIs('dashboard'),
                         'text-gray-500 group-hover:text-gray-700': !request()->routeIs('dashboard')
                     }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="ml-3" x-show="!sidebarCollapsed">Dashboard</span>
                @if(request()->routeIs('dashboard'))
                    <span class="absolute right-0 top-0 bottom-0 w-0.5 bg-indigo-600" x-show="!sidebarCollapsed"></span>
                @endif
            </a>
            
            <!-- Wallets -->
            <a href="{{ route('wallets.index') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors group"
               :class="{
                   'text-indigo-700 bg-indigo-50': request()->routeIs('wallets.*'),
                   'text-gray-700 hover:bg-gray-100': !request()->routeIs('wallets.*'),
                   'justify-center': sidebarCollapsed,
                   'justify-start': !sidebarCollapsed
               }">
                <svg class="flex-shrink-0 h-5 w-5" 
                     :class="{
                         'text-indigo-600': request()->routeIs('wallets.*'),
                         'text-gray-500 group-hover:text-gray-700': !request()->routeIs('wallets.*')
                     }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                </svg>
                <span class="ml-3" x-show="!sidebarCollapsed">Wallets</span>
                @if(request()->routeIs('wallets.*'))
                    <span class="absolute right-0 top-0 bottom-0 w-0.5 bg-indigo-600" x-show="!sidebarCollapsed"></span>
                @endif
            </a>
            
            <!-- Transactions -->
            <a href="{{ route('transactions.index') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors group"
               :class="{
                   'text-indigo-700 bg-indigo-50': request()->routeIs('transactions.*'),
                   'text-gray-700 hover:bg-gray-100': !request()->routeIs('transactions.*'),
                   'justify-center': sidebarCollapsed,
                   'justify-start': !sidebarCollapsed
               }">
                <svg class="flex-shrink-0 h-5 w-5" 
                     :class="{
                         'text-indigo-600': request()->routeIs('transactions.*'),
                         'text-gray-500 group-hover:text-gray-700': !request()->routeIs('transactions.*')
                     }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="ml-3" x-show="!sidebarCollapsed">Transactions</span>
                @if(request()->routeIs('transactions.*'))
                    <span class="absolute right-0 top-0 bottom-0 w-0.5 bg-indigo-600" x-show="!sidebarCollapsed"></span>
                @endif
            </a>
            
            <!-- Users (Admin only) -->
            @if(Auth::user()->hasRole('admin'))
            <a href="{{ route('users.index') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors group"
               :class="{
                   'text-indigo-700 bg-indigo-50': request()->routeIs('users.*'),
                   'text-gray-700 hover:bg-gray-100': !request()->routeIs('users.*'),
                   'justify-center': sidebarCollapsed,
                   'justify-start': !sidebarCollapsed
               }">
                <svg class="flex-shrink-0 h-5 w-5" 
                     :class="{
                         'text-indigo-600': request()->routeIs('users.*'),
                         'text-gray-500 group-hover:text-gray-700': !request()->routeIs('users.*')
                     }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                </svg>
                <span class="ml-3" x-show="!sidebarCollapsed">Users</span>
                @if(request()->routeIs('users.*'))
                    <span class="absolute right-0 top-0 bottom-0 w-0.5 bg-indigo-600" x-show="!sidebarCollapsed"></span>
                @endif
            </a>
            @endif
        </nav>
        
        <!-- User profile section -->
        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center" 
                 :class="{ 'justify-center': sidebarCollapsed, 'justify-start': !sidebarCollapsed }">
                <div class="flex-shrink-0">
                    <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center">
                        <span class="text-indigo-800 text-sm font-medium">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </span>
                    </div>
                </div>
                <div class="ml-3" x-show="!sidebarCollapsed">
                    <div class="text-sm font-medium text-gray-700 truncate">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="text-xs text-gray-500 truncate">
                        {{ Auth::user()->role->display_name ?? 'User' }}
                    </div>
                </div>
            </div>
            
            <div class="mt-3 space-y-1" x-show="!sidebarCollapsed">
                <a href="{{ route('profile.edit') }}"
                   class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100 transition-colors">
                    <svg class="flex-shrink-0 h-4 w-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Profile
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100 transition-colors">
                        <svg class="flex-shrink-0 h-4 w-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Sign out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>