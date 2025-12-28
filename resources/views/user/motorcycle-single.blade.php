@extends('user.layouts.app')

@section('content')
<style>
    .sticky-sidebar {
        position: sticky;
        top: 100px;
    }
    .total-price-box {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        border: 2px solid #e73a3e;
    }
    .midtrans-btn {
        background: #e73a3e;
        color: white;
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        font-size: 18px;
        transition: 0.3s;
    }
    .midtrans-btn:hover {
        background: #ce2c30;
    }
    /* Simple spinner */
    .spinner {
        display: none;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255,255,255,.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
</style>

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg.jpg') }}');"></div>
    <div class="container">
        <div class="page-header__inner">
            <h3>{{ $motorcycle->brand }} {{ $motorcycle->type }}</h3>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="{{ route('motorcycles.index') }}">Motorcycles</a></li>
                <li>Details</li>
            </ul>
        </div>
    </div>
</section>

<section class="listing-details">
    <div class="container">
        <div class="row">
            <!-- Left: Details -->
            <div class="col-xl-8 col-lg-7">
                <div class="listing-details__img">
                    <img src="{{ asset('storage/' . $motorcycle->image_path) }}" alt="{{ $motorcycle->type }}" onerror="this.onerror=null; this.src='{{ asset('assets/images/resources/listing-details-img-1.jpg') }}';">
                </div>
                
                <div class="listing-details__content">
                    <h3 class="listing-details__title">{{ $motorcycle->brand }} {{ $motorcycle->type }}</h3>
                    <p class="listing-details__text">{{ $motorcycle->description ?? 'No description available for this awesome motorbike.' }}</p>
                    
                    <ul class="list-unstyled listing-details__features-list">
                        <li>
                            <div class="icon"><span class="icon-fast-food"></span></div>
                            <div class="text"><h5>Fuel</h5><p>{{ $motorcycle->fuel_configuration ?? 'Petrol' }}</p></div>
                        </li>
                        <li>
                            <div class="icon"><span class="icon-speedometer"></span></div>
                            <div class="text"><h5>Engine</h5><p>{{ $motorcycle->cc ?? 'N/A' }} CC</p></div>
                        </li>
                        <li>
                            <div class="icon"><span class="icon-transmission"></span></div>
                            <div class="text"><h5>Trans</h5><p>{{ $motorcycle->transmission ?? 'Automatic' }}</p></div>
                        </li>
                         <li>
                            <div class="icon"><span class="icon-wallet"></span></div>
                            <div class="text"><h5>Price</h5><p>Rp {{ number_format($motorcycle->price, 0, ',', '.') }} / day</p></div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right: Booking Form -->
            <div class="col-xl-4 col-lg-5">
                <div class="sticky-sidebar">
                    <div class="total-price-box">
                        <h4 class="mb-4">Book This Bike</h4>
                        <form id="booking-form">
                            @csrf
                            <input type="hidden" name="motorcycle_id" value="{{ $motorcycle->id }}">
                            <input type="hidden" id="base_price" value="{{ $motorcycle->price }}">
                            
                            <!-- Date Range -->
                            <div class="form-group mb-3">
                                <label>Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" required min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" required min="{{ date('Y-m-d') }}">
                            </div>

                            <!-- Duration Display -->
                            <div class="d-flex justify-content-between mb-3">
                                <span>Duration:</span>
                                <span id="duration_display">0 Days</span>
                            </div>

                            <!-- Accessories -->
                            @if($accessories->count() > 0)
                            <div class="form-group mb-3">
                                <label class="mb-2"><strong>Add Accessories:</strong></label>
                                @foreach($accessories as $acc)
                                <div class="form-check">
                                    <input class="form-check-input accessory-check" type="checkbox" name="accessories[]" value="{{ $acc->id }}" data-price="{{ $acc->daily_price }}">
                                    <label class="form-check-label">
                                        {{ $acc->accessory_name }} (+Rp {{ number_format($acc->daily_price, 0, ',', '.') }}/day)
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            <!-- Delivery -->
                            <div class="form-group mb-3">
                                <label><strong>Delivery Method:</strong></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="delivery_type" id="pickup" value="pickup" checked>
                                    <label class="form-check-label" for="pickup">Pick up at Store (Free)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="delivery_type" id="delivery" value="delivery">
                                    <label class="form-check-label" for="delivery">Delivery to Location</label>
                                </div>
                            </div>

                            <div class="form-group mb-3" id="distance_group" style="display: none;">
                                <label>Distance to your location (km)</label>
                                <input type="number" name="distance" id="distance" class="form-control" value="0" min="0">
                                <small class="text-muted">Est. delivery fee: Rp 5.000/km</small>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between mb-2">
                                <span>Rental Cost:</span>
                                <span id="rental_cost">Rp 0</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Accessories:</span>
                                <span id="accessories_cost">Rp 0</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Delivery Fee:</span>
                                <span id="delivery_cost">Rp 0</span>
                            </div>
                            
                            <div class="d-flex justify-content-between mb-4">
                                <h5><strong>Total:</strong></h5>
                                <h5 id="total_display" style="color: #e73a3e;">Rp 0</h5>
                            </div>

                            <button type="submit" class="midtrans-btn" id="pay-button">
                                Rent Now <div class="spinner ms-2"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Midtrans Snap Script -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="Mid-client-XXXXX"></script> 
<!-- Note: In production use correct Client Key env -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');
        const basePrice = parseFloat(document.getElementById('base_price').value);
        const distanceInput = document.getElementById('distance');
        const deliveryRadios = document.getElementsByName('delivery_type');
        const distanceGroup = document.getElementById('distance_group');
        
        function calculateTotal() {
            // 1. Duration
            const start = new Date(startDate.value);
            const end = new Date(endDate.value);
            let days = 0;
            
            if (startDate.value && endDate.value && end >= start) {
                const diffTime = Math.abs(end - start);
                days = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; 
            }
            document.getElementById('duration_display').innerText = days + ' Days';
            
            // 2. Base Rental
            const rentalCost = basePrice * days;
            document.getElementById('rental_cost').innerText = 'Rp ' + rentalCost.toLocaleString('id-ID');

            // 3. Accessories
            let accCost = 0;
            document.querySelectorAll('.accessory-check:checked').forEach(acc => {
                accCost += parseFloat(acc.getAttribute('data-price')) * days;
            });
            document.getElementById('accessories_cost').innerText = 'Rp ' + accCost.toLocaleString('id-ID');

            // 4. Delivery
            let deliveryCost = 0;
            let isDelivery = document.getElementById('delivery').checked;
            if (isDelivery) {
                distanceGroup.style.display = 'block';
                const dist = parseFloat(distanceInput.value) || 0;
                deliveryCost = dist * 5000;
            } else {
                distanceGroup.style.display = 'none';
            }
            document.getElementById('delivery_cost').innerText = 'Rp ' + deliveryCost.toLocaleString('id-ID');

            // Total
            const total = rentalCost + accCost + deliveryCost;
            document.getElementById('total_display').innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        // Attach Events
        startDate.addEventListener('change', calculateTotal);
        endDate.addEventListener('change', calculateTotal);
        distanceInput.addEventListener('input', calculateTotal);
        document.querySelectorAll('.accessory-check').forEach(el => el.addEventListener('change', calculateTotal));
        deliveryRadios.forEach(el => el.addEventListener('change', calculateTotal));

        // Submit Booking
        const form = document.getElementById('booking-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate dates
            if(!startDate.value || !endDate.value) {
                alert('Please select valid dates');
                return;
            }

            const btn = document.getElementById('pay-button');
            const spinner = btn.querySelector('.spinner');
            btn.disabled = true;
            spinner.style.display = 'inline-block';

            const formData = new FormData(form);

            fetch("{{ route('booking.checkout') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                btn.disabled = false;
                spinner.style.display = 'none';

                if(data.error) {
                    alert('Error: ' + data.error);
                } else if (data.snap_token) {
                    // Trigger Snap Popup
                    window.snap.pay(data.snap_token, {
                        onSuccess: function(result){
                            alert("Payment Successful!");
                            window.location.href = "{{ route('booking.success') }}";
                        },
                        onPending: function(result){
                            alert("Waiting for payment!");
                        },
                        onError: function(result){
                            alert("Payment failed!");
                        },
                        onClose: function(){
                            alert('You closed the popup without finishing the payment');
                        }
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                btn.disabled = false;
                spinner.style.display = 'none';
                alert('Something went wrong. Please try again.');
            });
        });
    });
</script>
@endsection
