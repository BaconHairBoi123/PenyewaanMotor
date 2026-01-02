@if ($motorcycles->count() > 0)
    <div class="row">
        @foreach ($motorcycles as $motor)
            <div class="col-xl-12 mb-3">
                <div class="card shadow-sm border-0 p-3">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            @if ($motor->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($motor->image_path))
                                <img src="{{ asset('storage/' . $motor->image_path) }}" alt="motor" class="rounded"
                                    style="width: 100%; max-width: 150px; height: 100px; object-fit: cover;">
                            @else
                                {{-- Jika database kosong ATAU file fisik tidak ditemukan --}}
                                <img src="{{ asset('assets/images/resources/RIDEnotrasparan.png') }}"
                                    alt="No Image Available" class="rounded" style="width: 100%; max-width: 150px; height: 100px; object-fit: cover;">
                            @endif
                        </div>

                        <div class="col-md-7">
                            <h4 class="mb-1 text-uppercase">{{ $motor->brand }} {{ $motor->category }}</h4>
                            <p class="text-muted mb-1">Plat Nomor: <span
                                    class="badge bg-dark">{{ $motor->license_plate }}</span></p>
                            <p class="mb-0 text-muted">Status: {{ strtoupper($motor->status) }} | {{ $motor->cc }} CC
                            </p>
                        </div>

                        <div class="col-md-3 text-end">
                            <button class="thm-btn py-2 btn-telusuri" data-id="{{ $motor->id }}">
                                Telusuri Servis Motor
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="row justify-content-center py-5">
        <div class="col-md-6 text-center">
            <h1 class="display-1 fw-bold text-muted" style="opacity: 0.1;">404</h1>
            <h3 class="text-secondary">DATA TIDAK DITEMUKAN</h3>
            <p class="text-muted">Maaf, motor dengan plat nomor tersebut tidak ditemukan.</p>
        </div>
    </div>
@endif
