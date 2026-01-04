<x-admin-layout title="Admin Dashboard">

    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
    {{-- notofikasi --}}
    {{-- NOTIFICATIONS --}}
<div class="bg-white p-6 rounded-xl shadow mb-8">
    <h2 class="text-lg font-semibold mb-4">Notifications</h2>

    <ul class="space-y-2">

        @if(($notifVerifications ?? 0) > 0)
        <li class="text-yellow-600">
            🔍 {{ $notifVerifications }} user menunggu verifikasi
        </li>
        @endif

        @if(($notifNewRentals ?? 0) > 0)
        <li class="text-blue-600">
            📦 {{ $notifNewRentals }} penyewaan baru hari ini
        </li>
        @endif

        @if(($notifPaymentsPending ?? 0) > 0)
        <li class="text-red-600">
            💳 {{ $notifPaymentsPending }} pembayaran belum dikonfirmasi
        </li>
        @endif

        @if(($notifServiceDue ?? 0) > 0)
        <li class="text-orange-600">
            🛠 {{ $notifServiceDue }} motor perlu servis
        </li>
        @endif

        @if(($notifReturnSoon ?? 0) > 0)
        <li class="text-purple-600">
            ⏰ {{ $notifReturnSoon }} motor akan dikembalikan 3 hari lagi
        </li>
        @endif

        @if(
            ($notifVerifications ?? 0) == 0 &&
            ($notifNewRentals ?? 0) == 0 &&
            ($notifPaymentsPending ?? 0) == 0 &&
            ($notifServiceDue ?? 0) == 0 &&
            ($notifReturnSoon ?? 0) == 0
        )
        <li class="text-green-600">✅ Tidak ada notifikasi</li>
        @endif

    </ul>
</div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

        {{-- Total Motorcycles --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-gray-500">Total Motorcycles</p>
            <h2 class="text-3xl font-bold">{{ $totalMotorcycles ?? 0 }}</h2>
        </div>

        {{-- Rented Motorcycles --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-gray-500">Rented Motorcycles</p>
            <h2 class="text-3xl font-bold text-blue-600">{{ $rentedMotorcycles ?? 0 }}</h2>
        </div>

        {{-- Total Users --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-gray-500">Total Users</p>
            <h2 class="text-3xl font-bold">{{ $totalUsers ?? 0 }}</h2>
        </div>

        {{-- Today's Rentals --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-gray-500">Rentals Today</p>
            <h2 class="text-3xl font-bold text-green-600">{{ $todayRentals ?? 0 }}</h2>
        </div>

    </div>


    {{-- QUICK ACTIONS --}}
    <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>

    <div class="flex gap-4 mb-10">
        <a href="{{ route('admin.motorcycles.create') }}"

            class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700">
            Add Motorcycle
        </a>

        <a href="{{ route('admin.payments.index') }}"
            class="px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700">
            View Transactions
        </a>

        <a href="{{ route('admin.users.index') }}"
            class="px-4 py-2 bg-purple-600 text-white rounded shadow hover:bg-purple-700">
            Manage Users
        </a>
    </div>


    {{-- LATEST RENTALS --}}
    <h2 class="text-xl font-semibold mb-4">Latest Rentals</h2>

    <div class="bg-white p-6 rounded-xl shadow">

        @if(isset($latestRentals) && count($latestRentals) > 0)
            <ul class="space-y-3">
                @foreach ($latestRentals as $rent)
                    <li class="border-b pb-2">
                        <strong>{{ $rent->user_name }}</strong>
                        rented
                        <strong>{{ $rent->motorcycle_brand }} {{ $rent->motorcycle_type }}</strong>
                        ({{ $rent->motorcycle_plate }})
                        on {{ $rent->start_date }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No rentals yet.</p>
        @endif

    </div>

</x-admin-layout>
