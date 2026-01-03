@extends('user.layouts.app')

@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url('{{ $motorcycle->image_path ? asset('storage/' . $motorcycle->image_path) : asset('assets/images/resources/RIDEnotrasparan.png') }}');"></div>
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

    <section class="listing-single">
        <div class="container">
            <div class="listing-single__top">
                <div class="listing-single__top-left">
                    <h3 class="listing-single__title">{{ $motorcycle->brand }} {{ str_replace('_', ' ', ucfirst($motorcycle->type)) }}</h3>
                    <p class="listing-single__sub-title">{{ $motorcycle->category }}</p>
                    <div class="listing-single__car-details-box">
                        <ul class="list-unstyled listing-single__car-details">
                            <li><span class="icon-date"></span><p>{{ \Carbon\Carbon::parse($motorcycle->created_at)->year }}</p></li>
                            <li><span class="icon-fuel-type"></span><p>{{ $motorcycle->fuel_configuration }}</p></li>
                            <li><span class="icon-Carrier"></span><p>{{ $motorcycle->transmission }}</p></li>
                            <li><span class="icon-engine"></span><p>{{ $motorcycle->cc }} CC</p></li>
                        </ul>
                    </div>
                </div>
                <div class="listing-single__top-right">
                    <h2 class="listing-single__price">Rp {{ number_format($motorcycle->price, 0, ',', '.') }}<span>/ Day</span></h2>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-10">
                    <div class="listing-single__main-content">
                        <div class="main-image-box">
                            <img id="main-display-img" 
                                 src="{{ $motorcycle->image_path ? asset('storage/' . $motorcycle->image_path) : asset('assets/images/resources/RIDEnotrasparan.png') }}" 
                                 style="width: 100%; height: 500px; object-fit: cover; border-radius: 15px 0 0 15px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div style="height: 500px; overflow-y: auto; background: #f4f4f4; border-radius: 0 15px 15px 0; padding: 10px;">
                        <div class="d-flex flex-column gap-2">
                            <div class="thumbnail-item" style="cursor: pointer;">
                                <img src="{{ $motorcycle->image_path ? asset('storage/' . $motorcycle->image_path) : asset('assets/images/resources/RIDEnotrasparan.png') }}" 
                                     style="width: 100%; height: 80px; object-fit: cover; border-radius: 5px; border: 2px solid #e62e2d;"
                                     onclick="changeMainImage(this.src, this)">
                            </div>
                            @foreach ($motorcycle->images as $img)
                                <div class="thumbnail-item" style="cursor: pointer;">
                                    <img src="{{ asset('storage/' . $img->image_path) }}" 
                                         style="width: 100%; height: 80px; object-fit: cover; border-radius: 5px; opacity: 0.7;"
                                         onclick="changeMainImage(this.src, this)">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="listing-single__car-overview">
                        <h3 class="listing-single__car-overview-title">Motorcycle Overview</h3>
                        <p class="listing-single__text">{{ $motorcycle->description ?? 'No description available.' }}</p>

                        <h3 class="listing-single__car-overview-title mt-5">Specifications</h3>
                        <ul class="list-unstyled listing-single__car-overview-point">
                            <li class="d-flex justify-content-between border-bottom py-2">
                                <span><i class="icon-car1"></i> Type</span>
                                <strong>{{ str_replace('_', ' ', ucfirst($motorcycle->type)) }}</strong>
                            </li>
                            <li class="d-flex justify-content-between border-bottom py-2">
                                <span><i class="icon-fuel-type"></i> Fuel</span>
                                <strong>{{ $motorcycle->fuel_configuration }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="listing-single__sidebar">
                        <div class="listing-single__rent-car listing-single__single-box shadow p-4 bg-white rounded">
                            <h3 class="listing-single__rent-car-title mb-4">Book This Motorcycle</h3>
                            <form id="booking-form">
                                @csrf
                                <input type="hidden" name="motorcycle_id" value="{{ $motorcycle->id }}" id="motorcycle_id">
                                
                                <div class="form-group mb-3">
                                    <label class="small font-weight-bold">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small font-weight-bold">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small font-weight-bold">Delivery Option</label>
                                    <select name="delivery_type" id="delivery_type" class="form-control">
                                        <option value="pickup">Pickup at Store (Free)</option>
                                        <option value="delivery">Delivery to Location (Rp 20.000)</option>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <h6 class="small font-weight-bold">Add Extra Accessories:</h6>
                                    <ul class="list-unstyled">
                                        @foreach ($accessories as $acc)
                                            <li class="d-flex justify-content-between align-items-center mb-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="accessories[]" id="acc_{{ $acc->id }}" value="{{ $acc->id }}" data-price="{{ $acc->daily_price }}">
                                                    <label class="custom-control-label small" for="acc_{{ $acc->id }}">{{ $acc->accessory_name }}</label>
                                                </div>
                                                <span class="small text-muted">Rp {{ number_format($acc->daily_price, 0, ',', '.') }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="bg-light p-3 rounded mt-4">
                                    <div class="d-flex justify-content-between small"><span>Days</span><span id="total-days">0</span></div>
                                    <div class="d-flex justify-content-between small"><span>Base Price</span><span id="base-price-display">Rp 0</span></div>
                                    <div class="d-flex justify-content-between font-weight-bold border-top mt-2 pt-2 text-danger">
                                        <span>Total</span><span id="total-payable-display">Rp 0</span>
                                    </div>
                                </div>
                                <button type="button" id="pay-button" class="thm-btn w-100 mt-4">Rent Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
        // Fungsi ini harus di luar DOMContentLoaded agar onclick di HTML bisa memanggilnya
        function changeMainImage(src, element) {
            document.getElementById('main-display-img').src = src;
            const thumbnails = document.querySelectorAll('.thumbnail-item img');
            thumbnails.forEach(img => {
                img.style.border = "none";
                img.style.opacity = "0.7";
            });
            element.style.border = "2px solid #e62e2d";
            element.style.opacity = "1";
        }

        document.addEventListener('DOMContentLoaded', function() {
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const deliveryTypeSelect = document.getElementById('delivery_type');
            const motorcyclePrice = {{ $motorcycle->price }};
            const payButton = document.getElementById('pay-button');

            // Hitung total saat input berubah
            [startDateInput, endDateInput, deliveryTypeSelect].forEach(el => {
                el.addEventListener('change', calculateTotal);
            });

            document.querySelectorAll('input[name="accessories[]"]').forEach(el => {
                el.addEventListener('change', calculateTotal);
            });

            function calculateTotal() {
                const start = new Date(startDateInput.value);
                const end = new Date(endDateInput.value);
                let diffDays = 0;

                if (startDateInput.value && endDateInput.value && end >= start) {
                    diffDays = Math.ceil(Math.abs(end - start) / (1000 * 60 * 60 * 24)) + 1;
                }

                let deliveryFee = deliveryTypeSelect.value === 'delivery' ? 20000 : 0;
                let accTotal = 0;
                document.querySelectorAll('input[name="accessories[]"]:checked').forEach(acc => {
                    accTotal += parseInt(acc.dataset.price);
                });

                let base = motorcyclePrice * diffDays;
                let total = base + (accTotal * diffDays) + deliveryFee;

                document.getElementById('total-days').innerText = diffDays;
                document.getElementById('base-price-display').innerText = formatRupiah(base);
                document.getElementById('total-payable-display').innerText = formatRupiah(total);
            }

            function formatRupiah(amount) {
                return 'Rp ' + new Intl.NumberFormat('id-ID').format(amount);
            }

            payButton.addEventListener('click', async function() {
                if (!startDateInput.value || !endDateInput.value) {
                    alert("Please select dates.");
                    return;
                }
                
                payButton.disabled = true;
                const formData = new FormData(document.getElementById('booking-form'));

                try {
                    const response = await fetch("{{ route('booking.checkout') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        },
                        body: formData
                    });
                    
                    const data = await response.json();
                    if (data.snap_token) {
                        window.snap.pay(data.snap_token, {
                            onSuccess: () => { window.location.href = "{{ route('booking.success') }}"; },
                            onClose: () => { payButton.disabled = false; }
                        });
                    } else {
                        alert("Checkout failed.");
                        payButton.disabled = false;
                    }
                } catch (e) {
                    alert("Error connection.");
                    payButton.disabled = false;
                }
            });
        });
    </script>
@endsection