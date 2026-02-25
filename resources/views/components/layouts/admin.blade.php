<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FourFront') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="flex min-h-screen" x-data="{ sidebarOpen: false, sidebarCollapsed: false }">
        <!-- Mobile sidebar overlay -->
        @include('layouts.partials.mobile-sidebar')
        
        <!-- Desktop sidebar -->
        @include('layouts.partials.sidebar')
        
        <!-- Main content -->
        <div class="flex-1 flex flex-col min-w-0 lg:ml-0" 
             :class="{ 'lg:ml-sidebar': !sidebarCollapsed, 'lg:ml-sidebar-collapsed': sidebarCollapsed }">
            
            <!-- Header -->
            @include('layouts.partials.header')
            
            <!-- Page content -->
            <main class="flex-1 pb-8">
                <!-- Page header -->
                @if(isset($header) || isset($pageTitle))
                    <div class="bg-white shadow-sm border-b border-gray-200">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="py-6">
                                @isset($pageTitle)
                                    <h1 class="text-2xl font-bold text-gray-900">{{ $pageTitle }}</h1>
                                @else
                                    {{ $header }}
                                @endisset
                            </div>
                        </div>
                    </div>
                @endif
                
                <!-- Main content area -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>
