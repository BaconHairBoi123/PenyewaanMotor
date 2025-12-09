<x-user-layout title="Dashboard Pengguna">

    <section class="user-dashboard-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                
                {{-- Kolom Kiri: Menu Navigasi Dashboard --}}
                <div class="col-lg-3">
                    @include('user.components.dashboard-nav')
                </div>

                {{-- Kolom Kanan: Konten Utama Dashboard --}}
                <div class="col-lg-9">
                    <div class="dashboard-main-content">
                        
                        {{-- Cek apakah user sudah login --}}
                        @auth
                            <h2 class="mb-4">
                                Selamat Datang Kembali, {{ Auth::user()->name }}!
                            </h2>
                        @endauth
                        
                        <div class="row mb-5">
                            {{-- Card Statistik 1 --}}
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Pemesanan Aktif</h5>
                                        <p class="card-text fs-2 fw-bold">3</p>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Card Statistik 2 --}}
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Pemesanan Selesai</h5>
                                        <p class="card-text fs-2 fw-bold">12</p>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Card Statistik 3 --}}
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card bg-warning text-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Notifikasi Baru</h5>
                                        <p class="card-text fs-2 fw-bold">2</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Riwayat Pemesanan --}}
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>Riwayat Pemesanan Terbaru</h4>
                            </div>
                            <div class="card-body">
                                <p>Tabel atau daftar pemesanan terbaru Anda akan muncul di sini.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</x-user-layout>
