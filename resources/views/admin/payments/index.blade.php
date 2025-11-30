<x-admin-layout title="Payments Confirmation">

<h1 class="text-2xl font-bold mb-4">Payments Confirmation</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-3">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="bg-red-100 text-red-700 p-3 rounded mb-3">{{ session('error') }}</div>
@endif

<div class="bg-white shadow rounded overflow-x-auto">
<table class="w-full">
<thead class="bg-gray-100">
<tr>
    <th class="p-3">User</th>
    <th class="p-3">Motor</th>
    <th class="p-3">Invoice</th>
    <th class="p-3">Method</th>
    <th class="p-3">Total</th>
    <th class="p-3">Date</th>
    <th class="p-3">Status</th>
    <th class="p-3">Action</th>
</tr>
</thead>
<tbody>

@forelse($payments as $p)
<tr class="border-t text-center">
    <td class="p-2">{{ $p->user_name }}</td>
    <td class="p-2">
        {{ $p->brand }} {{ $p->type }}  
        ({{ $p->license_plate }})
    </td>
    <td class="p-2">{{ $p->invoice_number }}</td>
    <td class="p-2">{{ strtoupper($p->payment_method) }}</td>
    <td class="p-2">Rp {{ number_format($p->total_amount) }}</td>
    <td class="p-2">{{ $p->payment_date }}</td>

    <td class="p-2">
        <span class="px-2 py-1 rounded text-sm
            {{ $p->status == 'success' ? 'bg-green-200 text-green-700' : 
               ($p->status == 'failed' ? 'bg-red-200 text-red-700' : 'bg-yellow-200 text-yellow-700') }}">
            {{ ucfirst($p->status) }}
        </span>
    </td>

    <td class="p-2">
        @if($p->status == 'pending')
        <form action="{{ route('admin.payments.success', $p->id) }}" method="POST" class="inline">
            @csrf
            <button class="bg-green-600 text-white px-2 py-1 rounded">
                Confirm
            </button>
        </form>

        <form action="{{ route('admin.payments.failed', $p->id) }}" method="POST" class="inline">
            @csrf
            <button class="bg-red-600 text-white px-2 py-1 rounded">
                Reject
            </button>
        </form>
        @else
            <span class="text-gray-500">Done</span>
        @endif
    </td>
</tr>
@empty
<tr>
    <td colspan="8" class="p-4 text-gray-500 text-center">
        No payment data.
    </td>
</tr>
@endforelse

</tbody>
</table>
</div>

</x-admin-layout>
