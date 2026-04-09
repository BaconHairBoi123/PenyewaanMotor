<div class="fixed inset-y-0 left-0 bg-dark-card border-r border-gray-800 text-gray-300 w-64 h-screen flex flex-col transition-transform duration-300 z-50"
     :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
     
    {{-- Logo Area --}}
    <div class="h-20 flex items-center justify-center border-b border-gray-800 p-4">
        <a href="{{ route('admin.dashboard') }}" class="block">
            <img src="{{ asset('img/logo/logo_ridenusa_white_BTG.png') }}" alt="Ride Nusa" class="max-h-20 w-auto object-contain glow-effect hidden dark:block transition-all">
            {{-- Fallback text or light mode version if needed --}}
            <img src="{{ asset('img/logo/logo_ridenusa_white_BTG.png') }}" alt="Ride Nusa" class="max-h-20 w-auto object-contain block dark:hidden">
        </a>
    </div>

    {{-- Main Menu --}}
    <div class="flex-1 overflow-y-auto p-4 space-y-6">
        <div>
            <p class="px-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Main Menu</p>
            @include('admin.partials.menu')
        </div>

        <div>
            <p class="px-2 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Account</p>
            <ul class="space-y-1 text-sm font-medium">
                <li>
                    <a href="{{ route('admin.account') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-300 hover:text-brand hover:bg-dark-hover">
                        <i class="ri-user-settings-line text-lg"></i>
                        <span>Admin Account</span>
                    </a>
                </li>
                <li class="pt-4">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg text-white bg-red-600/80 hover:bg-red-600 transition-colors shadow">
                            <i class="ri-logout-circle-r-line"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
