@extends('user.layouts.app')

@section('content')
<section class="service-search-section py-5">
    <div class="container">
        <div id="search-area" class="row justify-content-center mb-5">
            <div class="col-md-8">
                <form id="search-service-form" class="d-flex gap-2">
                    <input type="text" name="license_plate" id="license_plate" class="form-control"
                        placeholder="Masukkan Plat Nomor Motor..." style="height: 50px;" autocomplete="off">
                    <button type="submit" class="thm-btn" style="min-width: 150px;">Cari Data</button>
                </form>
            </div>
        </div>

        <div id="service-list-container">
            @include('partials.service_list')
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // A. PENCARIAN REAL-TIME
        $('#license_plate').on('keyup input', function() {
            let plate = $(this).val();

            $.ajax({
                url: "{{ route('services') }}",
                type: "GET",
                data: { license_plate: plate },
                beforeSend: function() {
                    $('#service-list-container').css('opacity', '0.5');
                },
                success: function(data) {
                    $('#service-list-container').html(data);
                    $('#service-list-container').css('opacity', '1');
                    $('#search-area').show(); // Pastikan search bar muncul saat cari ulang
                }
            });
        });

        // B. TOMBOL TELUSURI (Detail)
        $(document).on('click', '.btn-telusuri', function(e) {
            e.preventDefault();
            let motorId = $(this).data('id');

            $.ajax({
                url: "/service-detail/" + motorId,
                type: "GET",
                success: function(data) {
                    $('#service-list-container').html(data);
                    $('#search-area').hide(); // Sembunyikan search bar saat lihat detail (opsional)
                    window.scrollTo(0, 0);
                }
            });
        });

        // C. TOMBOL KEMBALI
        $(document).on('click', '#btn-back-to-list', function() {
            $('#search-area').show();
            $('#license_plate').trigger('input'); // Trigger ajax pencarian kembali
        });

        // Mencegah form reload jika tekan Enter
        $('#search-service-form').on('submit', function(e) {
            e.preventDefault();
        });
    });
</script>
@endsection