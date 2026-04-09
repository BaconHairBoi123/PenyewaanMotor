<nav class="sticky top-0 z-40 bg-white/80 dark:bg-dark-card/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 transition-colors duration-300 flex items-center justify-between px-6 py-4">
    
    <div class="flex items-center gap-4">
        {{-- Sidebar Toggle Button --}}
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 dark:text-gray-400 hover:text-brand dark:hover:text-brand transition-colors focus:outline-none">
            <i class="ri-menu-line text-2xl"></i>
        </button>
        
        <div class="text-xl font-semibold text-gray-800 dark:text-gray-100 hidden sm:block">
            Dashboard
        </div>
    </div>

    <div class="flex items-center gap-6">
        
        {{-- Dark Mode Toggle --}}
        <button @click="darkMode = !darkMode" class="text-gray-500 dark:text-gray-400 hover:text-brand transition-colors focus:outline-none bg-gray-100 dark:bg-dark-hover p-2 rounded-full">
            <i class="ri-moon-line text-xl" x-show="!darkMode"></i>
            <i class="ri-sun-line text-xl" x-show="darkMode" x-cloak></i>
        </button>

        {{-- User Profile Area --}}
        <div class="flex items-center gap-3">
            <div class="text-right hidden md:block">
                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                    {{ Auth::guard('admin')->user()->email ?? 'Admin' }}
                </p>
                <p class="text-xs text-brand font-medium">Administrator</p>
            </div>
            
            <div class="h-10 w-10 rounded-full bg-brand flex items-center justify-center text-white font-bold shadow-md">
                <i class="ri-user-settings-fill text-xl"></i>
            </div>
        </div>
        
    </div>

</nav>
