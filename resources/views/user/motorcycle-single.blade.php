@extends('user.layouts.app')

@section('content')
    <section class="page-header">
        <div class="page-header__bg"
            style="background-image: url('{{ $motorcycle->image_path ? asset('storage/' . $motorcycle->image_path) : asset('assets/images/resources/RIDEnotrasparan.png') }}');">
        </div>
        <div class="page-header__shape-1"
            style="background-image: url('{{ asset('assets/images/shapes/page-header-shape-1.png') }}');"></div>
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
                    <h3 class="listing-single__title">{{ $motorcycle->brand }}
                        {{ str_replace('_', ' ', ucfirst($motorcycle->type)) }}</h3>
                    <p class="listing-single__sub-title">{{ $motorcycle->category }}</p>
                    <div class="listing-single__car-details-box">
                        <ul class="list-unstyled listing-single__car-details">
                            <li><span class="icon-date"></span>
                                <p>{{ \Carbon\Carbon::parse($motorcycle->created_at)->year }}</p>
                            </li>
                            <li><span class="icon-fuel-type"></span>
                                <p>{{ $motorcycle->fuel_configuration }}</p>
                            </li>
                            <li><span class="icon-Carrier"></span>
                                <p>{{ $motorcycle->transmission }}</p>
                            </li>
                            <li><span class="icon-engine"></span>
                                <p>{{ $motorcycle->cc }} CC</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="listing-single__top-right">
                    <h2 class="listing-single__price">Rp {{ number_format($motorcycle->price, 0, ',', '.') }}<span>/
                            Day</span></h2>
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
                    <div
                        style="height: 500px; overflow-y: auto; background: #f4f4f4; border-radius: 0 15px 15px 0; padding: 10px;">
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
                                <input type="hidden" name="motorcycle_id" value="{{ $motorcycle->id }}"
                                    id="motorcycle_id">

                                <div class="form-group mb-3">
                                    <label class="small font-weight-bold">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small font-weight-bold">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="delivery_type">Delivery Type</label>
                                    <select id="delivery_type" name="delivery_type" class="form-control">
                                        <option value="pickup">Pick Up (Ambil Sendiri)</option>
                                        <option value="delivery">Delivery (Antar ke Lokasi)</option>
                                    </select>
                                </div>

                                <div id="address-container" style="display: none; margin-top: 15px;">
                                    <label for="delivery_address">Alamat Pengantaran</label>
                                    <input type="text" id="delivery_address" name="delivery_address" class="form-control"
                                        placeholder="Ketik alamat atau nama jalan...">
                                    <div id="address-results"
                                        style="background: white; border: 1px solid #ddd; display: none; position: absolute; z-index: 1000; width: 100%;">
                                    </div>

                                    <input type="hidden" name="latitude" id="latitude">
                                    <input type="hidden" name="longitude" id="longitude">
                                    <input type="hidden" name="distance_km" id="distance_km">

                                    <small id="distance-info" class="text-primary mt-2 d-block"></small>
                                </div>

                                <div class="mt-4">
                                    <h6 class="small font-weight-bold">Add Extra Accessories:</h6>
                                    <ul class="list-unstyled">
                                        @foreach ($accessories as $acc)
                                            <li class="d-flex justify-content-between align-items-center mb-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="accessories[]" id="acc_{{ $acc->id }}"
                                                        value="{{ $acc->id }}"
                                                        data-price="{{ $acc->daily_price }}">
                                                    <label class="custom-control-label small"
                                                        for="acc_{{ $acc->id }}">{{ $acc->accessory_name }}</label>
                                                </div>
                                                <span class="small text-muted">Rp
                                                    {{ number_format($acc->daily_price, 0, ',', '.') }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="bg-light p-3 rounded mt-4" id="price-summary">
                                    <div class="d-flex justify-content-between small">
                                        <span>Rental Duration</span>
                                        <div><span id="total-days">0</span> Days</div>
                                    </div>
                                    <div class="d-flex justify-content-between small mt-1">
                                        <span>Motorcycle Price</span>
                                        <span id="base-price-display">Rp 0</span>
                                    </div>
                                    <div class="d-flex justify-content-between small mt-1">
                                        <span>Accessories</span>
                                        <span id="accessories-price-display">Rp 0</span>
                                    </div>
                                    <div class="d-flex justify-content-between small mt-1">
                                        <span>Delivery Fee</span>
                                        <span id="delivery-fee-display">Rp 0</span>
                                    </div>
                                    <div class="d-flex justify-content-between font-weight-bold border-top mt-2 pt-2 text-danger">
                                        <span>Total Payable</span>
                                        <span id="total-payable-display">Rp 0</span>
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

    <!-- Midtrans Snap is loaded globally in the header to avoid duplicate loads -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. KONFIGURASI
            const storeLoc = {
                lat: -8.798599,
                lng: 115.162452
            }; // Lokasi RideNusa
            const pricePerKm = 5000; // Ongkos kirim per KM
            const bikePricePerDay = {{ $motorcycle->price ?? 0 }}; // Mengambil harga motor dari PHP (Safe Fallback)

            // 2. ELEMENT SELECTOR
            const deliveryTypeSelect = document.getElementById('delivery_type');
            const addressContainer = document.getElementById('address-container');
            const addressInput = document.getElementById('delivery_address');
            const resultsDiv = document.getElementById('address-results');
            const distanceInfo = document.getElementById('distance-info');
            const accessoryCheckboxes = document.querySelectorAll('input[name="accessories[]"]');

            let currentDeliveryFee = 0;

            // 3. FUNGSI TOGGLE ALAMAT
            function toggleAddressInput() {
                if (deliveryTypeSelect.value === 'delivery') {
                    addressContainer.style.display = 'block';
                    addressInput.setAttribute('required', 'required');
                } else {
                    addressContainer.style.display = 'none';
                    addressInput.removeAttribute('required');
                    addressInput.value = '';
                    distanceInfo.innerText = '';
                    currentDeliveryFee = 0;
                    calculateTotal();
                }
            }

            // Jalankan saat ada perubahan dropdown
            // Tambahkan listener jQuery untuk kompatibilitas dengan plugin tema (seperti NiceSelect)
            if (typeof jQuery !== 'undefined') {
                jQuery('#delivery_type').on('change', toggleAddressInput);
            }
            deliveryTypeSelect.addEventListener('change', toggleAddressInput);
            
            // Panggil sekali saat halaman dimuat untuk memastikan status awal benar
            toggleAddressInput();

            // 4. AUTOCOMPLETE ALAMAT (OSM NOMINATIM)
            addressInput.addEventListener('input', function() {
                const query = this.value;
                if (query.length < 3) {
                    resultsDiv.style.display = 'none';
                    return;
                }

                // Cari alamat di Bali menggunakan OpenStreetMap
                fetch(
                        `https://nominatim.openstreetmap.org/search?format=json&q=${query}&viewbox=114.4,-8.1,115.7,-8.9&bounded=1`)
                    .then(res => res.json())
                    .then(data => {
                        resultsDiv.innerHTML = '';
                        if (data.length > 0) {
                            resultsDiv.style.display = 'block';
                            data.slice(0, 5).forEach(item => {
                                const div = document.createElement('div');
                                div.style.padding = '10px';
                                div.style.cursor = 'pointer';
                                div.style.borderBottom = '1px solid #eee';
                                div.innerHTML =
                                    `<i class="fa fa-map-marker-alt"></i> ${item.display_name}`;

                                div.onclick = function() {
                                    addressInput.value = item.display_name;
                                    resultsDiv.style.display = 'none';

                                    // Simpan Koordinat ke input sesuai nama di form
                                    const latEl = document.getElementById('latitude');
                                    const lngEl = document.getElementById('longitude');
                                    if (latEl) latEl.value = item.lat;
                                    if (lngEl) lngEl.value = item.lon;

                                    // Hitung Jarak & Ongkir
                                    const dist = calculateDistance(storeLoc.lat, storeLoc
                                        .lng, parseFloat(item.lat), parseFloat(item.lon)
                                        );
                                    currentDeliveryFee = Math.ceil(dist) * pricePerKm;

                                    document.getElementById('distance_km').value = dist
                                        .toFixed(2);
                                    distanceInfo.innerText =
                                        `Jarak: ${dist.toFixed(1)} km (Ongkir: Rp ${currentDeliveryFee.toLocaleString('id-ID')})`;

                                    calculateTotal();
                                };
                                resultsDiv.appendChild(div);
                            });
                        }
                    });
            });

            // 5. FUNGSI HITUNG TOTAL
            function calculateTotal() {
                const startDateInput = document.getElementById('start_date');
                const endDateInput = document.getElementById('end_date');
                const start = startDateInput.value ? new Date(startDateInput.value) : null;
                const end = endDateInput.value ? new Date(endDateInput.value) : null;

                let days = 0;
                // Pastikan kedua tanggal valid dan tanggal akhir tidak sebelum tanggal mulai
                if (start && end && end >= start) {
                    // Tambah 1 untuk membuat periode sewa inklusif dengan hari terakhir
                    days = Math.ceil((end - start) / (1000 * 60 * 60 * 24)) + 1;
                }

                // Hitung biaya dasar sewa motor
                const basePrice = days * bikePricePerDay;

                // Hitung total biaya aksesori
                let accessoriesTotal = 0;
                accessoryCheckboxes.forEach(acc => {
                    if (acc.checked) {
                        accessoriesTotal += parseFloat(acc.dataset.price) * days;
                    }
                });

                // Kalkulasi total akhir
                const total = basePrice + accessoriesTotal + currentDeliveryFee;

                // Update elemen display
                document.getElementById('total-days').innerText = days;
                document.getElementById('base-price-display').innerText = 'Rp ' + basePrice.toLocaleString('id-ID');
                document.getElementById('accessories-price-display').innerText = 'Rp ' + accessoriesTotal.toLocaleString('id-ID');
                document.getElementById('delivery-fee-display').innerText = 'Rp ' + currentDeliveryFee.toLocaleString('id-ID');
                document.getElementById('total-payable-display').innerText = 'Rp ' + total.toLocaleString('id-ID');
            }

            // 6. RUMUS HAVERSINE (HITUNG JARAK)
            function calculateDistance(lat1, lon1, lat2, lon2) {
                const R = 6371;
                const dLat = (lat2 - lat1) * Math.PI / 180;
                const dLon = (lon2 - lon1) * Math.PI / 180;
                const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * Math.sin(dLon / 2) * Math.sin(
                        dLon / 2);
                return R * (2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)));
            }

            // Pasang listener pada tanggal agar total update otomatis
            const startDateElem = document.getElementById('start_date');
            const endDateElem = document.getElementById('end_date');

            startDateElem.addEventListener('change', function() {
                if (this.value) {
                    // Set minimal End Date sama dengan Start Date
                    endDateElem.min = this.value;

                    // Hitung maksimal End Date (Start Date + 30 hari)
                    const start = new Date(this.value);
                    const maxDate = new Date(start);
                    maxDate.setDate(start.getDate() + 30);

                    // Format tanggal ke YYYY-MM-DD
                    const yyyy = maxDate.getFullYear();
                    const mm = String(maxDate.getMonth() + 1).padStart(2, '0');
                    const dd = String(maxDate.getDate()).padStart(2, '0');
                    const maxDateString = `${yyyy}-${mm}-${dd}`;

                    endDateElem.max = maxDateString;

                    // Jika End Date yang sudah dipilih sebelumnya tidak valid (diluar range), reset
                    if (endDateElem.value && (endDateElem.value > maxDateString || endDateElem.value < this.value)) {
                        endDateElem.value = '';
                        alert('Maksimal durasi sewa adalah 30 hari.');
                    }
                }
                calculateTotal();
            });

            endDateElem.addEventListener('change', calculateTotal);

            // Pasang listener pada checkbox aksesori
            accessoryCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', calculateTotal);
            });

            // HANDLE: Rent Now -> create checkout & call Midtrans Snap
            const payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', async function() {
                calculateTotal();

                const start = document.getElementById('start_date').value;
                const end = document.getElementById('end_date').value;
                if (!start || !end) {
                    alert('Silakan pilih tanggal mulai dan akhir sewa.');
                    return;
                }

                // If delivery is selected, ensure address and coordinates are present
                if (deliveryTypeSelect.value === 'delivery') {
                    const addr = document.getElementById('delivery_address') ? document.getElementById('delivery_address').value.trim() : '';
                    const lat = document.getElementById('latitude') ? document.getElementById('latitude').value.trim() : '';
                    const lng = document.getElementById('longitude') ? document.getElementById('longitude').value.trim() : '';
                    if (!addr || !lat || !lng) {
                        alert('Silakan pilih alamat pengantaran dari daftar suggestion agar koordinat tersimpan.');
                        return;
                    }
                }

                const token = document.querySelector('input[name="_token"]').value;

                const payload = {
                    motorcycle_id: document.getElementById('motorcycle_id').value,
                    start_date: start,
                    end_date: end,
                    delivery_type: document.getElementById('delivery_type').value,
                    delivery_address: document.getElementById('delivery_address') ? document.getElementById('delivery_address').value : null,
                    latitude: document.getElementById('latitude') ? document.getElementById('latitude').value : null,
                    longitude: document.getElementById('longitude') ? document.getElementById('longitude').value : null,
                    distance_km: document.getElementById('distance_km').value || 0,
                    accessories: Array.from(document.querySelectorAll('input[name="accessories[]"]:checked')).map(i => i.value)
                };

                // Debug: print payload to console to help trace missing fields
                console.log('Checkout payload:', payload);

                try {
                    const res = await fetch("{{ route('booking.checkout') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify(payload)
                    });

                    const json = await res.json();
                    if (!res.ok) {
                        alert(json.error || 'Kesalahan server saat membuat checkout.');
                        return;
                    }

                    if (json.snap_token) {
                        window.snap.pay(json.snap_token, {
                            onSuccess: function(result) {
                                window.location = "{{ route('booking.success') }}";
                            },
                            onPending: function(result) {
                                window.location = "{{ route('booking.success') }}";
                            },
                            onError: function(err) {
                                alert('Terjadi kesalahan saat proses pembayaran.');
                                console.error(err);
                            }
                        });
                    } else {
                        alert('Token pembayaran tidak diterima.');
                    }
                } catch (err) {
                    console.error(err);
                    alert('Gagal melakukan request. Cek console untuk detil.');
                }
            });
        });
    </script>
@endsection
