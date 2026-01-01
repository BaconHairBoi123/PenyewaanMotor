<div class="container py-4">
    <div class="mb-4">
        <button id="btn-back-to-list" class="btn btn-outline-dark btn-sm shadow-sm px-3">
            <i class="fas fa-undo-alt me-2"></i> Kembali ke Daftar
        </button>
    </div>

    <div class="row align-items-center mb-5 bg-white p-4 rounded shadow-sm">
        <div class="col-md-5">
            <div class="bg-light d-flex align-items-center justify-content-center rounded border" style="height: 250px; overflow: hidden;">
                @if($motor->image_path)
                    <img src="{{ asset('storage/' . $motor->image_path) }}" class="img-fluid" style="object-fit: contain; width: 100%; height: 100%;">
                @else
                    <h3 class="text-muted">No Image</h3>
                @endif
            </div>
        </div>
        
        <div class="col-md-7">
            <span class="badge bg-primary mb-2">{{ $motor->brand }}</span>
            <h2 class="fw-bold mb-3 text-uppercase">{{ $motor->brand }} {{ $motor->category }}</h2>
            <div class="p-3 border rounded bg-light">
                <p class="mb-2"><strong>Plat Nomor:</strong> <span class="text-primary">{{ $motor->license_plate }}</span></p>
                <p class="mb-2"><strong>Kapasitas Mesin:</strong> {{ $motor->cc }} CC</p>
                <p class="mb-0"><strong>Status Kendaraan:</strong> <span class="text-success">{{ strtoupper($motor->status) }}</span></p>
            </div>
        </div>
    </div>

    <div class="text-center mb-4">
        <h4 class="fw-bold text-dark">RIWAYAT SERVIS</h4>
        <div style="width: 50px; height: 3px; background: #ff5e14; margin: 10px auto;"></div>
    </div>

    <div class="table-responsive bg-white p-3 rounded shadow-sm">
        <table class="table table-hover border">
            <thead class="bg-light">
                <tr>
                    <th>Tanggal Servis</th>
                    <th>Kilometer Terakhir</th>
                    <th>Keterangan / Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($motor->services as $history)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($history->service_date)->format('d F Y') }}</td>
                    <td>{{ number_format($history->kilometer, 0, ',', '.') }} KM</td>
                    <td>{{ $history->description ?? 'Pemeliharaan Rutin' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-5 text-muted">
                        <i class="fas fa-info-circle me-2"></i> Belum ada catatan riwayat servis untuk motor ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>