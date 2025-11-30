<div class="w-64 fixed h-screen bg-[#0A244D] text-white p-6">

    <h2 class="text-2xl font-bold mb-8">ADMIN PANEL</h2>

    {{-- Load menu --}}
    @include('admin.partials.menu')

    <p class="text-gray-400 text-xs mt-6">ACCOUNT</p>

    <ul class="space-y-4">
        <li>
            <a href="{{ route('admin.account') }}" class="block p-2 hover:bg-blue-900 rounded">
                Admin Account
            </a>
        </li>

        <li class="mt-6">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="w-full bg-red-600 p-2 rounded">Logout</button>
            </form>
        </li>
    </ul>

</div>
