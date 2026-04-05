<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SJS') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        /* Custom DataTables Styling agar senada dengan Tailwind */
        .dataTables_wrapper .dataTables_length select { padding-right: 2.5rem !important; border-radius: 0.375rem; border-color: #d1d5db; }
        .dataTables_wrapper .dataTables_filter input { border-radius: 0.375rem; border-color: #d1d5db; padding: 0.4rem 0.75rem !important; margin-left: 0.5rem; outline: none; }
        .dataTables_wrapper .dataTables_filter input:focus { border-color: #3b82f6 !important; ring: 2px; ring-color: #3b82f6; }
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter { margin-bottom: 20px !important; }
        .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate { margin-top: 20px !important; }
        table.dataTable { border-collapse: collapse !important; border-radius: 0.5rem; overflow: hidden; border: 1px solid #e5e7eb !important; }
        table.dataTable thead th { background-color: #f9fafb; border-bottom: 1px solid #e5e7eb !important; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100" x-data="{ sidebarOpen: true }">
    <div class="flex h-screen overflow-hidden">
        
        <aside 
            :class="sidebarOpen ? 'w-64' : 'w-0 md:w-20'"
            class="bg-slate-800 text-white flex-shrink-0 transition-all duration-300 ease-in-out flex flex-col z-20">
            
            <div class="p-4 h-16 flex items-center justify-center text-xl font-bold border-b border-slate-700 overflow-hidden whitespace-nowrap">
                <span x-show="sidebarOpen">Portal Jemaat</span>
                <span x-show="!sidebarOpen">⛪</span>
            </div>

            <nav class="flex-1 overflow-y-auto py-4 space-y-1">
    <a href="{{ route('dashboard') }}" 
       class="flex items-center px-6 py-3 transition duration-200 hover:bg-slate-700 {{ request()->routeIs('dashboard') ? 'bg-slate-700 border-l-4 border-blue-500 text-white' : 'text-slate-400' }}">
        <i class="bi bi-grid-1x2-fill text-lg"></i>
        <span x-show="sidebarOpen" class="ml-4 text-sm font-medium">Dashboard</span>
    </a>

    <a href="{{ route('families.index') }}" 
       class="flex items-center px-6 py-3 transition duration-200 hover:bg-slate-700 {{ request()->routeIs('families.*') ? 'bg-slate-700 border-l-4 border-blue-500 text-white' : 'text-slate-400' }}">
        <i class="bi bi-houses-fill text-lg"></i>
        <span x-show="sidebarOpen" class="ml-4 text-sm font-medium">Data Keluarga</span>
    </a>

    <a href="{{ route('members.index') }}" 
       class="flex items-center px-6 py-3 transition duration-200 hover:bg-slate-700 {{ request()->routeIs('members.index') ? 'bg-slate-700 border-l-4 border-blue-500 text-white' : 'text-slate-400' }}">
        <i class="bi bi-person-vcard-fill text-lg"></i>
        <span x-show="sidebarOpen" class="ml-4 text-sm font-medium">Data Jemaat</span>
    </a>

    <a href="{{ route('members.majelis') }}" 
       class="flex items-center px-6 py-3 transition duration-200 hover:bg-slate-700 {{ request()->routeIs('members.majelis') ? 'bg-slate-700 border-l-4 border-blue-500 text-white' : 'text-slate-400' }}">
        <i class="bi bi-person-badge-fill text-lg"></i>
        <span x-show="sidebarOpen" class="ml-4 text-sm font-medium">Data Majelis</span>
    </a>

    <a href="{{ route('members.pelkat') }}" 
       class="flex items-center px-6 py-3 transition duration-200 hover:bg-slate-700 {{ request()->routeIs('members.pelkat') ? 'bg-slate-700 border-l-4 border-blue-500 text-white' : 'text-slate-400' }}">
        <i class="bi bi-person-bounding-box text-lg"></i>
        <span x-show="sidebarOpen" class="ml-4 text-sm font-medium">Data Pelkat</span>
    </a>
</nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 z-10">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    @if (isset($header))
                        <div class="ml-4 hidden md:block">
                            <h2 class="text-lg font-semibold text-gray-700">Sistem Jemaat Sangkakala</h2>
                        </div>
                    @endif
                </div>

                <div class="flex items-center space-x-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-gray-700">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] text-gray-400 uppercase tracking-widest">Administrator</p>
                    </div>
                    
                    <div class="h-8 w-px bg-gray-200"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-bold transition flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-4 md:p-8">
                @if (isset($header))
                    <div class="mb-6 md:hidden">
                        <h1 class="text-xl font-bold text-gray-800">{{ $header }}</h1>
                    </div>
                @endif

                <div class="animate-fade-in">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    @stack('scripts')
</body>
</html>