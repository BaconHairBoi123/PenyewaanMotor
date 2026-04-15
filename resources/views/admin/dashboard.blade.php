@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

    {{-- NOTIFICATIONS --}}
    <div class="bg-white dark:bg-dark-card p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 mb-8 transition-colors">
        <div class="flex items-center gap-3 mb-4">
            <div class="p-2 bg-brand/10 rounded-lg text-brand">
                <i class="ri-notification-3-line text-xl"></i>
            </div>
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Notifications</h2>
        </div>

        <ul class="space-y-3">
            @php $hasNotif = false; @endphp

            @if(($notifVerifications ?? 0) > 0)
                @php $hasNotif = true; @endphp
                <li class="flex items-center gap-3 p-3 bg-yellow-50 text-yellow-700 dark:bg-yellow-500/10 dark:text-yellow-400 rounded-lg border border-yellow-100 dark:border-yellow-500/20">
                    <i class="ri-shield-user-line text-lg"></i>
                    <span>{{ $notifVerifications }} user menunggu verifikasi</span>
                </li>
            @endif

            @if(($notifNewRentals ?? 0) > 0)
                @php $hasNotif = true; @endphp
                <li class="flex items-center gap-3 p-3 bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400 rounded-lg border border-blue-100 dark:border-blue-500/20">
                    <i class="ri-motorbike-line text-lg"></i>
                    <span>{{ $notifNewRentals }} penyewaan baru hari ini</span>
                </li>
            @endif

            @if(($notifPaymentsPending ?? 0) > 0)
                @php $hasNotif = true; @endphp
                <li class="flex items-center gap-3 p-3 bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400 rounded-lg border border-red-100 dark:border-red-500/20">
                    <i class="ri-bank-card-line text-lg"></i>
                    <span>{{ $notifPaymentsPending }} pembayaran belum dikonfirmasi</span>
                </li>
            @endif

            @if(($notifServiceDue ?? 0) > 0)
                @php $hasNotif = true; @endphp
                <li class="flex items-center gap-3 p-3 bg-orange-50 text-orange-700 dark:bg-orange-500/10 dark:text-orange-400 rounded-lg border border-orange-100 dark:border-orange-500/20">
                    <i class="ri-tools-line text-lg"></i>
                    <span>{{ $notifServiceDue }} motor perlu servis</span>
                </li>
            @endif

            @if(($notifReturnSoon ?? 0) > 0)
                @php $hasNotif = true; @endphp
                <li class="flex items-center gap-3 p-3 bg-purple-50 text-purple-700 dark:bg-purple-500/10 dark:text-purple-400 rounded-lg border border-purple-100 dark:border-purple-500/20">
                    <i class="ri-timer-line text-lg"></i>
                    <span>{{ $notifReturnSoon }} motor akan dikembalikan 3 hari lagi</span>
                </li>
            @endif

            @if(!$hasNotif)
                <li class="flex items-center gap-3 p-3 bg-green-50 text-green-700 dark:bg-green-500/10 dark:text-green-400 rounded-lg border border-green-100 dark:border-green-500/20">
                    <i class="ri-checkbox-circle-line text-lg"></i>
                    <span>Tidak ada notifikasi baru</span>
                </li>
            @endif
        </ul>
    </div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        {{-- Total Motorcycles --}}
        <div class="bg-white dark:bg-dark-card p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Total Motorcycles</p>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{ $totalMotorcycles ?? 0 }}</h2>
                </div>
                <div class="h-12 w-12 rounded-full bg-brand/10 flex items-center justify-center text-brand">
                    <i class="ri-motorbike-fill text-2xl"></i>
                </div>
            </div>
        </div>

        {{-- Rented Motorcycles --}}
        <div class="bg-white dark:bg-dark-card p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
             <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Rented Active</p>
                    <h2 class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $rentedMotorcycles ?? 0 }}</h2>
                </div>
                <div class="h-12 w-12 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-500">
                    <i class="ri-riding-line text-2xl"></i>
                </div>
            </div>
        </div>

        {{-- Total Users --}}
        <div class="bg-white dark:bg-dark-card p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
             <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Total Users</p>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{ $totalUsers ?? 0 }}</h2>
                </div>
                <div class="h-12 w-12 rounded-full bg-purple-500/10 flex items-center justify-center text-purple-500">
                    <i class="ri-group-line text-2xl"></i>
                </div>
            </div>
        </div>

        {{-- Today's Rentals --}}
        <div class="bg-white dark:bg-dark-card p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
             <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Rentals Today</p>
                    <h2 class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $todayRentals ?? 0 }}</h2>
                </div>
                <div class="h-12 w-12 rounded-full bg-green-500/10 flex items-center justify-center text-green-500">
                    <i class="ri-calendar-check-line text-2xl"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- LATEST RENTALS --}}
        <div class="lg:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Latest Rentals</h2>
                <a href="{{ route('admin.payments.index') }}" class="text-sm text-brand hover:underline">View All</a>
            </div>

            <div class="bg-white dark:bg-dark-card rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden">
                @if(isset($latestRentals) && count($latestRentals) > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-dark-hover/50 text-gray-500 dark:text-gray-400 text-sm">
                                    <th class="px-6 py-4 font-medium">User</th>
                                    <th class="px-6 py-4 font-medium">Motorcycle</th>
                                    <th class="px-6 py-4 font-medium">Start Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                @foreach ($latestRentals as $rent)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-dark-hover/30 transition-colors">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-gray-200">
                                            {{ $rent->user_name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                            {{ $rent->motorcycle_brand }} {{ $rent->motorcycle_type }} 
                                            <span class="text-xs px-2 py-1 bg-gray-100 dark:bg-gray-800 rounded ml-2">{{ $rent->motorcycle_plate }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                            <i class="ri-calendar-line mr-1"></i> {{ $rent->start_date }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-8 text-center text-gray-500 dark:text-gray-400">
                        <i class="ri-inbox-line text-4xl mb-2 block"></i>
                        <p>No recent rentals.</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- QUICK ACTIONS --}}
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Quick Actions</h2>
            
            <div class="grid grid-cols-1 gap-4">
                <a href="{{ route('admin.motorcycles_Management.create') }}"
                   class="group flex items-center justify-between p-4 bg-white dark:bg-dark-card border border-gray-100 dark:border-gray-800 rounded-xl shadow-sm hover:border-brand dark:hover:border-brand transition-all">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-lg bg-brand/10 text-brand flex items-center justify-center transition-colors group-hover:bg-brand group-hover:text-white">
                            <i class="ri-add-line text-xl"></i>
                        </div>
                        <span class="font-medium text-gray-800 dark:text-gray-200">Add Motorcycle</span>
                    </div>
                    <i class="ri-arrow-right-s-line text-gray-400 group-hover:text-brand transition-colors"></i>
                </a>

                <a href="{{ route('admin.payments.index') }}"
                   class="group flex items-center justify-between p-4 bg-white dark:bg-dark-card border border-gray-100 dark:border-gray-800 rounded-xl shadow-sm hover:border-brand dark:hover:border-brand transition-all">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-lg bg-green-500/10 text-green-500 flex items-center justify-center transition-colors group-hover:bg-green-500 group-hover:text-white">
                            <i class="ri-money-dollar-circle-line text-xl"></i>
                        </div>
                        <span class="font-medium text-gray-800 dark:text-gray-200">View Transactions</span>
                    </div>
                    <i class="ri-arrow-right-s-line text-gray-400 group-hover:text-green-500 transition-colors"></i>
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="group flex items-center justify-between p-4 bg-white dark:bg-dark-card border border-gray-100 dark:border-gray-800 rounded-xl shadow-sm hover:border-brand dark:hover:border-brand transition-all">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-lg bg-purple-500/10 text-purple-500 flex items-center justify-center transition-colors group-hover:bg-purple-500 group-hover:text-white">
                            <i class="ri-group-line text-xl"></i>
                        </div>
                        <span class="font-medium text-gray-800 dark:text-gray-200">Manage Users</span>
                    </div>
                    <i class="ri-arrow-right-s-line text-gray-400 group-hover:text-purple-500 transition-colors"></i>
                </a>
            </div>
        </div>

    </div>

@endsection
