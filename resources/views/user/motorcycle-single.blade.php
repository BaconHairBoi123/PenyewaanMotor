@extends('user.layouts.app')

@section('content')

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url('{{ $motorcycle->image_path ? asset('storage/motorcycles/' . $motorcycle->image_path) : asset('assets/images/backgrounds/page-header-bg.jpg') }}');">
    </div>
    <div class="page-header__shape-1" style="background-image: url('{{ asset('assets/images/shapes/page-header-shape-1.png') }}');"></div>
    <div class="container">
        <div class="page-header__inner">
            <h3>{{ $motorcycle->brand }} {{ str_replace('_', ' ', ucfirst($motorcycle->type)) }}</h3>
            <div class="thm-breadcrumb__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li><span class="icon-arrow-left"></span></li>
                    <li><a href="{{ route('motorcycles.index') }}">Motorcycles</a></li>
                    <li><span class="icon-arrow-left"></span></li>
                    <li>{{ $motorcycle->brand }} {{ str_replace('_', ' ', ucfirst($motorcycle->type)) }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Listing Single Start-->
<section class="listing-single">
    <div class="container">
        <div class="listing-single__top">
            <div class="listing-single__top-left">
                <h3 class="listing-single__title">{{ $motorcycle->brand }} {{ str_replace('_', ' ', ucfirst($motorcycle->type)) }}</h3>
                <p class="listing-single__sub-title">{{ $motorcycle->category }}</p>
                <div class="listing-single__car-details-box">
                    <ul class="list-unstyled listing-single__car-details">
                        <li>
                            <span class="icon-date"></span>
                            <p>{{ \Carbon\Carbon::parse($motorcycle->created_at)->year }}</p>
                        </li>
                        <li>
                            <span class="icon-fuel-type"></span>
                            <p>{{ $motorcycle->fuel_configuration }}</p>
                        </li>
                        <li>
                            <span class="icon-Carrier"></span>
                            <p>{{ $motorcycle->transmission }}</p>
                        </li>
                        <li>
                            <span class="icon-engine"></span>
                            <p>{{ $motorcycle->cc }} CC</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="listing-single__top-right">
                <h2 class="listing-single__price">Rp {{ number_format($motorcycle->price, 0, ',', '.') }}<span>/ Day</span></h2>
            </div>
        </div>
        <div class="listing-single__inner">
            <div class="listing-single__main-content">
                <div class="swiper-container" id="listing-single__carousel">
                    <div class="swiper-wrapper">
                        <!-- Main Image -->
                        <div class="swiper-slide">
                            <div class="listing-single__main-content-inner">
                                <div class="listing-single__left">
                                    <div class="listing-single__img">
                                        @if($motorcycle->image_path)
                                            <img src="{{ asset('storage/motorcycles/' . $motorcycle->image_path) }}" alt="{{ $motorcycle->brand }}">
                                        @else
                                            <img src="{{ asset('assets/images/backgrounds/page-header-bg.jpg') }}" alt="Placeholder">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Images -->
                        @foreach($motorcycle->images as $img)
                        <div class="swiper-slide">
                            <div class="listing-single__main-content-inner">
                                <div class="listing-single__left">
                                    <div class="listing-single__img">
                                        <img src="{{ asset('storage/motorcycles/' . $img->image_path) }}" alt="{{ $motorcycle->brand }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="listing-single__nav">
                    <div class="swiper-button-next" id="listing-single__swiper-button-prev">
                        <i class="far fa-long-arrow-left"></i>
                    </div>
                    <div class="swiper-button-prev" id="listing-single__swiper-button-next">
                        <i class="far fa-long-arrow-right"></i>
                    </div>
                </div>
            </div>

            <!-- Thumbs -->
            <div class="listing-single__thumb-box">
                <div class="swiper-container" id="listing-single__thumb">
                    <div class="swiper-wrapper">
                        <!-- Main Image Thumb -->
                        <div class="swiper-slide">
                            <div class="listing-single__img-holder-box">
                                <div class="listing-single__img-holder">
                                    @if($motorcycle->image_path)
                                        <img src="{{ asset('storage/motorcycles/' . $motorcycle->image_path) }}" alt="{{ $motorcycle->brand }}">
                                    @else
                                        <img src="{{ asset('assets/images/backgrounds/page-header-bg.jpg') }}" alt="Placeholder">
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Images Thumbs -->
                        @foreach($motorcycle->images as $img)
                        <div class="swiper-slide">
                            <div class="listing-single__img-holder-box">
                                <div class="listing-single__img-holder">
                                    <img src="{{ asset('storage/motorcycles/' . $img->image_path) }}" alt="{{ $motorcycle->brand }}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        <div class="listing-single__bottom">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="listing-single__bottom-left">
                        <div class="listing-single__car-overview">
                            <h3 class="listing-single__car-overview-title">Motorcycle Overview</h3>
                            <p class="listing-single__text">
                                {{ $motorcycle->description ?? 'No description available for this motorcycle.' }}
                            </p>
                            
                            <h3 class="listing-single__car-overview-title mt-5">Features</h3>
                             <div class="listing-single__car-overview-points-box">
                                <ul class="list-unstyled listing-single__car-overview-point">
                                    <li>
                                        <div class="listing-single__car-overview-point-left">
                                            <i class="icon-car1"></i>
                                            <p>Type</p>
                                        </div>
                                        <div class="listing-single__car-overview-point-right">
                                            <p>{{ str_replace('_', ' ', ucfirst($motorcycle->type)) }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="listing-single__car-overview-point-left">
                                            <i class="icon-fuel-type"></i>
                                            <p>Fuel</p>
                                        </div>
                                        <div class="listing-single__car-overview-point-right">
                                            <p>{{ $motorcycle->fuel_configuration }}</p>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="listing-single__car-overview-point-left">
                                            <i class="icon-Carrier"></i>
                                            <p>Transmission</p>
                                        </div>
                                        <div class="listing-single__car-overview-point-right">
                                            <p>{{ $motorcycle->transmission }}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- BOOKING SIDEBAR -->
                <div class="col-xl-4 col-lg-5">
                    <div class="listing-single__sidebar">
                            
                        <div class="listing-single__rent-car listing-single__single-box">
                            <h3 class="listing-single__rent-car-title">Book This Motorcycle</h3>
                            <div class="listing-single__rent-car-content">
                                <form id="booking-form">
                                    @csrf
                                    <input type="hidden" name="motorcycle_id" value="{{ $motorcycle->id }}" id="motorcycle_id">
                                    
                                    <div class="listing-single__rent-car-content-form">
                                        <!-- Date Selection -->
                                        <div class="listing-single__rent-car-date-box">
                                            <p class="listing-single__rent-car-date-title">Start Date</p>
                                            <div class="listing-single__rent-car-date-time-box">
                                                <input type="date" name="start_date" id="start_date" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="listing-single__rent-car-date-box">
                                            <p class="listing-single__rent-car-date-title">End Date</p>
                                            <div class="listing-single__rent-car-date-time-box">
                                                <input type="date" name="end_date" id="end_date" class="form-control" required>
                                            </div>
                                        </div>

                                        <!-- Delivery Options -->
                                        <div class="listing-single__rent-car-extra">
                                            <h3 class="listing-single__rent-car-extra-title">Delivery Option:</h3>
                                            <div class="form-group">
                                                <select name="delivery_type" id="delivery_type" class="form-control" style="background:none; border: 1px solid #ddd; padding: 10px; width: 100%;">
                                                    <option value="pickup">Pickup at Store (Free)</option>
                                                    <option value="delivery">Delivery to Location (Rp 20.000)</option>
                                                </select>
                                            </div>
                                            <div id="delivery-distance-group" class="form-group mt-3" style="display: none;">
                                                <p class="text-info"><small><i class="fas fa-info-circle"></i> Flat delivery fee: Rp 20.000</small></p>
                                                <!-- Hidden distance input if backend still needs it temporarily -->
                                                <input type="hidden" name="distance" id="distance" value="1"> 
                                            </div>
                                        </div>

                                        <!-- Accessories -->
                                        <div class="listing-single__rent-car-extra">
                                            <h3 class="listing-single__rent-car-extra-title">Add Extra (Accessories):</h3>
                                            <ul class="list-unstyled">
                                                @foreach($accessories as $acc)
                                                <li>
                                                    <div class="checked-box">
                                                        <input type="checkbox" name="accessories[]" id="acc_{{ $acc->id }}" value="{{ $acc->id }}" data-price="{{ $acc->daily_price }}" {{ $acc->stock <= 0 ? 'disabled' : '' }}>
                                                        <label for="acc_{{ $acc->id }}" style="{{ $acc->stock <= 0 ? 'opacity: 0.5; cursor: not-allowed;' : '' }}">
                                                            <span></span>{{ $acc->accessory_name }}
                                                        </label>
                                                    </div>
                                                    <!-- Quantity Box -->
                                                    <div class="quantity-box mt-1" id="qty_box_{{ $acc->id }}" style="display: none; padding-left: 30px;">
                                                        <label><small>Qty (Max 2):</small></label>
                                                        <input type="number" name="accessory_qty[{{ $acc->id }}]" id="qty_input_{{ $acc->id }}" class="form-control d-inline-block" value="1" min="1" max="2" style="width: 70px; height: 30px; font-size: 14px; padding: 2px 5px;" disabled>
                                                    </div>

                                                    <div class="counts-box">
                                                        <p>Rp {{ number_format($acc->daily_price, 0, ',', '.') }}</p>
                                                        @if(isset($acc->stock))
                                                            <small class="{{ $acc->stock > 0 ? 'text-muted' : 'text-danger' }}">
                                                                (Stock: {{ $acc->stock }}{{ $acc->stock <= 0 ? ' - Out of Stock' : '' }})
                                                            </small>
                                                        @endif
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <p class="text-danger mt-2" id="accessory-error" style="display:none;"></p>
                                        </div>

                                        <!-- Price Breakdown -->
                                        <div class="listing-single__rent-car-price-box">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="title"><p>Base Price (<span id="total-days">0</span> days)</p></div>
                                                    <div class="price"><p id="base-price-display">Rp 0</p></div>
                                                </li>
                                                <li>
                                                    <div class="title"><p>Accessories</p></div>
                                                    <div class="price"><p id="accessories-price-display">Rp 0</p></div>
                                                </li>
                                                <li>
                                                    <div class="title"><p>Delivery Fee</p></div>
                                                    <div class="price"><p id="delivery-price-display">Rp 0</p></div>
                                                </li>
                                                <li class="total-line">
                                                    <div class="title"><p>Total Payable</p></div>
                                                    <div class="price"><p id="total-payable-display">Rp 0</p></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="listing-single__btn-box-2">
                                        <button type="button" id="pay-button" class="thm-btn w-100">Rent Now <span class="fas fa-arrow-right"></span></button>
                                    </div>
                                    <div id="error-message" class="text-danger mt-2"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--Listing Single End-->

<!-- Midtrans Snap Script -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    const deliveryTypeSelect = document.getElementById('delivery_type');
    const distanceInput = document.getElementById('distance');
    const distanceGroup = document.getElementById('delivery-distance-group');
    const motorcyclePrice = {{ $motorcycle->price }};
    const payButton = document.getElementById('pay-button');
    
    // Toggle Distance Input (Use jQuery to catch nice-select change event)
    $('#delivery_type').on('change', function() {
        if($(this).val() === 'delivery') {
            distanceGroup.style.display = 'block';
        } else {
            distanceGroup.style.display = 'none';
            distanceInput.value = 0;
        }
        calculateTotal();
    });

    // Event Listeners for Calculation
    [startDateInput, endDateInput].forEach(el => {
        el.addEventListener('change', calculateTotal);
        el.addEventListener('input', calculateTotal);
    });

    // Accessory Logic
    const accessoryCheckboxes = document.querySelectorAll('input[name="accessories[]"]');
    accessoryCheckboxes.forEach(el => {
        el.addEventListener('change', function() {
            const qtyBox = document.getElementById('qty_box_' + this.value);
            const qtyInput = document.getElementById('qty_input_' + this.value);
            
            if(this.checked) {
                qtyBox.style.display = 'block';
                qtyInput.disabled = false;
            } else {
                qtyBox.style.display = 'none';
                qtyInput.disabled = true;
                qtyInput.value = 1; // Reset to 1
            }
            calculateTotal();
        });
    });

    // Quantity Input Listeners
    document.querySelectorAll('input[name^="accessory_qty"]').forEach(el => {
        el.addEventListener('change', function() {
            if(this.value > 2) this.value = 2;
            if(this.value < 1) this.value = 1;
            calculateTotal();
        });
        el.addEventListener('input', function() {
            if(this.value > 2) this.value = 2;
            if(this.value < 1) this.value = 1;
            calculateTotal();
        });
    });

    function calculateTotal() {
        const start = new Date(startDateInput.value);
        const end = new Date(endDateInput.value);
        const hasDates = startDateInput.value && endDateInput.value && end >= start;
        
        // 1. Delivery Fee (Independent)
        let deliveryFee = 0;
        if(deliveryTypeSelect.value === 'delivery') {
             deliveryFee = 20000;
        }
        document.getElementById('delivery-price-display').innerText = formatRupiah(deliveryFee);

        // 2. Accessories (Independent - Flat Fee)
        let accessoriesTotal = 0;
        document.querySelectorAll('input[name="accessories[]"]:checked').forEach(acc => {
             const id = acc.value;
             const qtyInput = document.getElementById('qty_input_' + id);
             const qty = parseInt(qtyInput.value) || 1;
             
             accessoriesTotal += (parseInt(acc.dataset.price) * qty); // Flat fee
        });
        document.getElementById('accessories-price-display').innerText = formatRupiah(accessoriesTotal);

        // 3. Base Price (Dependent on Dates)
        let basePrice = 0;
        let diffDays = 0;
        
        if (hasDates) {
             const diffTime = Math.abs(end - start);
             diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; 
             basePrice = motorcyclePrice * diffDays;
        }

        // Update Displays
        document.getElementById('total-days').innerText = diffDays;
        document.getElementById('base-price-display').innerText = formatRupiah(basePrice);
        
        // 4. Total Payable
        const total = basePrice + accessoriesTotal + deliveryFee;
        document.getElementById('total-payable-display').innerText = formatRupiah(total);
        
        return total;
    }
    
    function formatRupiah(amount) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(amount);
    }

    // Payment Button Logic
    payButton.addEventListener('click', async function() {
        // Simple Validation
        if(!startDateInput.value || !endDateInput.value) {
            alert("Please select dates correctly.");
            return;
        }
        
        // Validate Accessories (Min 1)
        const checkedAccessories = document.querySelectorAll('input[name="accessories[]"]:checked').length;
        if(checkedAccessories < 1) {
            alert("Please select at least 1 accessory.");
            return;
        }

        // Prepare Data
        const formData = new FormData(document.getElementById('booking-form'));
        
        try {
            payButton.disabled = true;
            payButton.innerText = 'Processing...';
            
            const response = await fetch("{{ route('booking.checkout') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                body: formData
            });
            
            const data = await response.json();
            console.log("Server Response:", data); // DEBUG

            if(data.snap_token) {
                if (typeof window.snap === 'undefined') {
                    console.error("Midtrans Snap.js is not loaded!");
                    alert("Payment gateway failed to load. Please refresh and try again.");
                    return;
                }
                
                window.snap.pay(data.snap_token, {
                    onSuccess: function(result){
                        alert("Payment Success!");
                        window.location.href = "{{ route('booking.success') }}";
                    },
                    onPending: function(result){
                        alert("Waiting for payment!");
                        console.log(result);
                    },
                    onError: function(result){
                        alert("Payment failed!");
                        console.log(result);
                    },
                    onClose: function(){
                        alert('You closed the popup without finishing the payment');
                        payButton.disabled = false;
                        payButton.innerText = 'Rent Now';
                    }
                });
            } else {
                alert("Failed to get payment token: " + (data.error || 'Unknown error'));
                payButton.disabled = false;
                payButton.innerText = 'Rent Now';
            }
            
        } catch (error) {
            console.error("Catch Error:", error); // DEBUG
            alert("An error occurred: " + error.message);
            payButton.disabled = false;
            payButton.innerText = 'Rent Now';
        }
    });
});
</script>

@endsection

<!--Listing Single End-->







</div><!-- /.page-wrapper -->