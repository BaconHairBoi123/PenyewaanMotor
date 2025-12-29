@if($rentals->isEmpty())
    <div class="text-center p-4">
        <p>No rentals found.</p>
        <a href="{{ route('motorcycles.index') }}" class="btn btn-primary btn-sm mt-2">Rent Now</a>
    </div>
@else
    <ul class="list-unstyled">
        @foreach($rentals as $rental)
        @php
            $payment = $rental->payments->first();
            $paymentStatus = $payment ? $payment->status : 'pending';
            
            // Determine rental status
            $rentalStatus = 'Active';
            if($paymentStatus != 'success') {
                $rentalStatus = ucfirst($paymentStatus); // Pending/Failed
            } elseif ($rental->returns) {
                $rentalStatus = 'Returned';
            }
        @endphp
        <li class="mb-4 p-3 border rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="m-0">{{ $rental->motorcycle->brand ?? 'Unknown' }} {{ $rental->motorcycle->type ?? '' }}</h5>
                <span class="badge {{ $rentalStatus == 'Returned' ? 'bg-secondary' : ($paymentStatus == 'success' ? 'bg-success' : ($paymentStatus == 'pending' ? 'bg-warning' : 'bg-danger')) }}">
                    {{ $rentalStatus }}
                </span>
            </div>
            <p class="mb-1 text-muted small">
                {{ \Carbon\Carbon::parse($rental->start_date)->format('d M Y') }} - 
                {{ \Carbon\Carbon::parse($rental->return_date)->format('d M Y') }}
            </p>
            
            @if($rental->accessory_id)
                {{-- Note: Rental table currently only supports one accessory, update schema if multiple needed there too --}}
                <div class="mb-2">
                     <small class="fw-bold">Includes Accessory</small>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="fw-bold">Total: Rp {{ number_format($payment->total_amount ?? 0, 0, ',', '.') }}</span>
                {{-- We'd need to fetch snap token from booking or store it in rental/payment to allow repayment here --}}
            </div>
        </li>
        @endforeach
    </ul>
@endif
