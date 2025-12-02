<div class="bg-white p-4 shadow flex justify-between items-center">

    <div class="text-xl font-semibold">
        Selamat Datang
    </div>

    <div class="text-gray-600">
        {{ Auth::guard('admin')->user()->email ?? 'admin@email.com'}}
    </div>

</div>
